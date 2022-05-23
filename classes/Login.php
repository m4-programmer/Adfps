<?php 
session_start();
/**
 * 
 */

class Login extends Database
{
	private $regno;
	private $pword;
	private $errmsg;
	public static function loggedIn() {
		if(isset($_SESSION['lecturer']) ) {
			return true; 
		}
		return false;
	}

	// will read froma user table specifically for lecturers and admins
	public static function Authusers($lecno,$pword){
		//parent::__construct();
		$db = new Database;
		$qry = $db->query("SELECT * FROM users WHERE username = :user AND pword = :pword ");
		$db->bind(':user', $lecno);
		$db->bind(':pword', $pword);
		$row = $db->fetchresult();
		$check = $db->checkdata();
		//checks if users exist in database
		if ($check == 1) {
			// if users exist, then check if user is admin or lecturer
			$qry = $db->query("SELECT * FROM users WHERE username = :user AND level = :level ");
			$db->bind(':level', 1);
			$db->bind(':user', $lecno);
			$row = $db->fetchresult();
			$verify = $db->checkdata();
			if ($verify == 1) {
				$_SESSION['admin'] = $lecno;
				header("location: admin/");
			}else{
				$_SESSION['lecturer'] = $lecno;
				header("location: lecturer.php");
			}
			
		}else{
			header("location: index.php?errmsg=user does not exists");
		}
		
	}
	public static function Authstudents($regno,$pword)
	{
			
			if (empty($regno) || empty($pword)) {
				header("Location: ../index.php?errmsg= Please Fill in the require details& regno=$regno");
			}else{
				$db = new Database;
				$db->query("SELECT * FROM students WHERE stu_regno = :regno AND pword=:pword");
				$db->bind(":pword", $pword);
				$db->bind(":regno", $regno);
				$row = $db->fetchresult();
				$checker = $db->checkdata();
				// check if user exist in database
				if ($checker  == 0) {
					Login::Authusers($regno,$pword);
				}else{
					// check if user is student
					@session_start();
					$_SESSION['regno'] = $regno;
					header("location: students/");
				}
			}
		}

	
}


?>

