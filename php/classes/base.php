<?PHP
	class base {
		static function getUserName () {
			$hash = $_COOKIE['sessionid'];
			$concordance = @$_COOKIE['userid'];
			if (($hash) && ($concordance)) {
				include_once "io.php";
				$file = "data/cache/".$hash;
				$userSettings = new io($file);
				if ($userSettings->get("concordance") == $concordance) {
					return $userSettings->get("username");
				}
			}
		}
		
		static function getUserLevel ($username = "") {
			if (!$username) {
				$username = base::getUserName();
			}
			include_once "user.php";
			$user = new user($username);
			$userLevel = $user->getUserLevel();
			if (!$userLevel) { $userLevel = 0; }
			return $userLevel;
			
		}
		
		function getFilename () {
			return basename($_SERVER['REQUEST_URI']);
		}
		
		static function getTemplateRoot () {
			return "templates/default/";
		}
		
		function error ($errorId) {
			print "Error!";
			
		}

	}

?>