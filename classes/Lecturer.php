<?php 

class Lecturer extends Login
{
	// check if lecturer is login
	// if true, then serve him a page that gives him an input field to verify that a student has paid a department feees
	function __construct($regno)
	{
		if (isset($_SESSION['lecturer'])) {
				$this->verify_student($regno);
				
		}else{
			return false;
		}
	}
	// show user from the database if he has paid else return an error message
	public function verify_student($regno)
	{
			$checkstatus = "SELECT * from payment where regno = :regno ORDER BY session = :session desc limit 1";
				$this->bind(":regno", $regno);
				$this->bind(":session", $session);
				$result = $this->fetchresult();
				if ($this->checkdata() > 0) {
					return $result;
				}else{
					return false;
				}
	}
	// he inputs the students details and pres serarch which trigers a function from the admin class to check that the student has paid the due for the session and semester
	// will use ajax o fetch the rsponse
}

 ?>