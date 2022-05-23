<?php 

/**
 * 
 */
class Student 
{
	public $regno;
	protected $password; 
	public static function loggedIn() {
		if(isset($_SESSION['regno']) ) {
			return true; 
		}else{
		return false; 
		}
	}
	public static function fetchsession(){
		$db =new Database;
		$db->query("SELECT * FROM `session` order by session desc");
		$data = $db->fetchresult();
		$db->lastInsertId();

		return ($data);
		
		}
	
	public  function fetchstudent(){
		// verifies if student has been logged in
		if (Student::loggedIn() == true){

			$db =new Database;
		$db->query("SELECT id from students where stu_regno = :regno");
		$db->bind(':regno', $_SESSION['regno']);
		$stu_id = $db->fetchresult();
		foreach ($stu_id as $key) {
			$id = $key['id'];
		}
		$_SESSION['sid'] = $id;
		$db->query("SELECT * FROM students where stu_regno = :regno");
		$db->bind(':regno', $_SESSION['regno']);
		$data = $db->fetchresult();
		if ($db->checkdata() == 1) {
			 return $data;
			}
		}
	}
	public static function getlevel(){
		
		$db =new Database;
		$db->query("SELECT level FROM fees");
		$data = $db->fetchresult();
		
			 return $data;
				
}
	

	// view avaliable fees to pay
	public static function viewfees(){
		if (Student::loggedIn() == true){
		$db =new Database;
		$db->query("SELECT id from students where stu_regno = :regno");
		$db->bind(':regno', $_SESSION['regno']);
		$stu_id = $db->fetchresult();
		foreach ($stu_id as $key) {
			$id = $key['id'];
		}
		@session_start();
		$sid = $id;
		$_SESSION['id'] = $sid;
		$regno = $_SESSION['regno'];
		$session = $_GET['session'];
		 $_SESSION['sessions'] = $session;
		$level = $_GET['level'];
		$_SESSION['level'] = $level;
		$ref_no = md5($regno.$level.$session);
		$_SESSION['ref'] = $ref_no;

		// when users click on proceed we display the dues for them if they have generated one
		$db->query("SELECT * FROM fullfees where level = :level and stu_id = :id and session = :session");
		$db->bind(':level', $level);
		$db->bind(':id', $sid);
		$db->bind(':session', $session);
		$db->fetchresult();
		$checker = $db->checkdata();
		// check if users has generated dues before and display it for them
		if ($checker  == 1) {
		$db->query("SELECT * FROM fees inner join fullfees on fullfees.level = fees.level 
inner join session on session.session = fullfees.session
where fullfees.level = :level and stu_id = :id and  fullfees.session = :session");
		//where fullfees.level = :level and stu_id = :sid and session = :session 
		$db->bind(':level', $level);
		$db->bind(':id', $sid);
		$db->bind(':session', $session);
		$data = $db->fetchresult();
		return $data;
		}else{
		// if user has not generate fees before it generate it for them
		$db->query("INSERT INTO fullfees  values ('',:session,:level, :stu_id,:ref_id,now(),:status,'','')");

		$db->bind(':stu_id',$sid);
		$db->bind(':ref_id',$ref_no);
		$db->bind(':level',$level);
		$db->bind(':session',$session);
		$db->bind(":status",0);
		$fees = $db->execute();
		$id = $db->lastInsertId();
		//we display the generated fees for the users
		$db->query("SELECT * FROM fees inner join fullfees on fullfees.level = fees.level 
inner join session on session.session = fullfees.session
where fullfees.level = :level and stu_id = :id and  fullfees.session = :session");
		$db->bind(':level', $level);
		$db->bind(':id', $sid);
		$db->bind(':session', $session);
		$data = $db->fetchresult();
		$checker = $db->checkdata();
		if ($checker = 1) {
			return $data;
		}
	}
		}

	}
	// method to change students password
	public static function cpword($pword,$old){
		if (Student::loggedIn() == true){
		$db =new Database;
		$db->query("UPDATE students SET pword = :pword WHERE stu_regno = :regno and pword = :pwords;");
		$db->bind(':regno',$_SESSION['regno']);
		$db->bind(':pword',$pword);
		$db->bind(':pwords',$old);
		$db->execute();
		if ($db->checkdata()==true) {
			return true;
		}else{
			return false;
		}
		
			
		}
	}
	//method to update student profile
	public static function update_profile($email,$level,$session){
		if (Student::loggedIn() == true){
		$db =new Database;
		$db->query("UPDATE students SET level = :level,email= :email,curr_year = :session WHERE stu_regno = :regno;");
		$db->bind(':regno',$_SESSION['regno']);
		$db->bind(':email',$email);
		$db->bind(':level',$level);
		$db->bind(':session',$session);
		$fees = $db->execute();
		if (!$db->lastinsertid()) {
			return true;
			}else{
				return false;
			}
		}
	}
	public static function payfees($session){
		if (Student::loggedIn() == true){
		$db =new Database;
		// check if student has already pay from view fees and shows them their receipt
		$db->query("UPDATE fullfees SET status = :status,date_paid = now(),amount_paid = :amount WHERE level = :level and stu_id = :id and  session = :session");
		$db->bind(':status',1);
		$db->bind(':level', $_SESSION['level']);
		$db->bind(':id', $_SESSION['id']);
		$db->bind(':session', $session);
		$db->bind(':amount', $_SESSION['amount']);
		$db->execute();
		return true;
		}

	
		
	}
	public static function fees_history(){
			if (Student::loggedIn() == true){
		$db =new Database;
		$db->query("SELECT id from students where stu_regno = :regno");
		$db->bind(':regno', $_SESSION['regno']);
		$stu_id = $db->fetchresult();
		foreach ($stu_id as $key) {
			$id = $key['id'];
		}
		$sid = $id;
		// check if student has already pay from view fees and shows them their receipt
		$db->query("SELECT * from fullfees where   stu_id = :id and status = :status ");
		$db->bind(':status',1);
		$db->bind(':id', $sid);
	
		$data = $db->fetchresult();
		$check = $db->checkdata();
		
			return $data;
	}
	}
	//check if studet has paid fees for the session and level he selects
	public static function checkFeeStatus($session,$level){
		$db = new Database;
		$db->query("SELECT * FROM fullfees where session = :session and level = :level and stu_id = :id and status = :status");
		$db->bind(':session',$session);
		$db->bind(':status',1);
		$db->bind(':level',$level);
		$db->bind(':id',$_SESSION['sid']);
		$db->fetchresult();
		$check = $db->checkdata();
		if ($check > 0 ) {
			return true;
		}
	}
	/*public static function receipt($session,$level){
		$db = new Database;
		$db->query("SELECT * FROM fullfees where session = :session and level = :level and id = :id");
		// select students information from database
		if (!$db->lastinsertid()) {
		$db->query("SELECT * FROM fullfees where  ref_id = :ref_no and status = :status");
		$db->bind(':ref_no', $_SESSION['ref']);
		$db->bind(':status', 1);
		
		$data = $db->fetchresult();
		$checker = $db->checkdata();
		if ($checker > 0) {
			return true;	
		}else{
			return $msg ='error processing payment,please try again later, or contact the admin';
		}

		
			}else{
				
			}


	}*/
	



}
 ?>