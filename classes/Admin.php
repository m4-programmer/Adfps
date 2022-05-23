<?php 

/**
 * 
 */
class Admin extends Login
{
	private $username;
	private $password;
	private $message;
	private $stu_no;

	function __construct($username,$password,$stu_no=null)
	{
		$this->username = $username;
		$this->password = $password;
		$this->stu_no = $stu_no;
	}
	public static function loggedIn() {
		if( isset($_SESSION['admin'])) {
			return true; 
		}
		return false; 
	}
	public static function  fees(){
		$db = new Database;
		$db->query("SELECT * FROM fees");
		$db->fetchresult();
		return $db->checkdata();
	}
	public static function  payments(){
		$db = new Database;
		$db->query("SELECT * FROM payment");
		$db->fetchresult();
		return $db->checkdata();
	}
	public static function  students(){
		$db = new Database;
		$db->query("SELECT * FROM students");
		$db->fetchresult();
		return $db->checkdata();
	}
	public static function addlecturers($name,$uname,$pword){
		$db = new Database;
		$db->query("INSERT into users values('',:name,:uname,:pword,:level,now())");
		$db->bind(':level', 2);
		$db->bind(':name', $name);
		$db->bind(':uname', $uname);
		$db->bind(':pword',$pword);
		$db->execute();
		return true;
	}
	public static function viewlecturers(){
		$db = new Database;
		$db->query("SELECT * FROM users where level = :level");
		$db->bind(':level', 2);
		return $db->fetchresult();
	}
	function viewpaymentstatus($regno){
		$this->stu_no = $regno;
		$this->query("SELECT * FROM payment WHERE regno = :regno");
		$this->bind(':regno',$this->stu_no);
		$row = $this->fetchresult();
		return $row;
	}
	public static function paymentreport(){
		$db = new Database;
		
		$db->query("SELECT * FROM students INNER JOIN fullfees ON stu_id = students.id where status = :num order BY date_paid DESC");
		$db->bind(':num',1);
		$result= $db->fetchresult();
		return $result;
	}
	
	function viewstudents(){
		parent::__construct();
		$this->query("SELECT * FROM students ORDER BY level desc");
		$row = $this->fetchresult();
		return $row;
	}
	public static function deleteStudent($id){
	$db = new Database;
	$db->query('DELETE FROM students WHERE id = :id');
	$db->bind(':id', $id);
	$db->execute();
	return true;
	}
	public static function deleteSession($id){
	$db = new Database;
	$db->query('DELETE FROM session WHERE session = :id');
	$db->bind(':id', $id);
	$db->execute();
	return true;
	}
	public function change_pword($old,$pword)
	{
		$db =new Database;
		$db->query("UPDATE users SET pword = :pword WHERE username = :regno and pword = :pwords");
		$db->bind(':regno',$_SESSION['admin']);
		$db->bind(':pword',$pword);
		$db->bind(':pwords',$old);
		$db->execute();
		if ($db->checkdata()==true) {
			return true;
		}else{
			return false;
		}
	}
// Creating function
	// get student regno and auto increment it

	public static function getRegNo(){
		$db = new Database;
		$db->query('SELECT * from students ');
		$data = $db->fetchresult();
		foreach ($data as $dtaum) {
			$regno = $dtaum['stu_regno'];
		}
		return $regno;
	}
	public static function create_User($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k){
		$db = new Database;
		// check if user already
		$qry = $db->query("SELECT * FROM students WHERE email = :email ");
		$db->bind(':email', $e);
		$row = $db->fetchresult();
		$check = $db->checkdata();
		//checks if users exist in database
		if ($check > 0) {
			// print_r($row);
			header("location: add_student.php?msg=Email Taken, Please Select A New Email");
		}
		else{

		$db->query("INSERT into students values('',:a,:b,:c,:d,:d,:e,:f,:g,'',:h,:i,:j,:k,now())");
		$db->bind(':a', $a);
		$db->bind(':b', $b);
		$db->bind(':c', $c);
		$db->bind(':d', $d);
		$db->bind(':e', $e);
		$db->bind(':f', $f);
		$db->bind(':g', $g);
		$db->bind(':h', $h);
		$db->bind(':i', $i);
		$db->bind(':j', $j);
		$db->bind(':k', $k);
		$db->execute();
		$id = $db->lastInsertId();
		header("location: add_student.php?msg=User Inserted Successfully");
		}

	} 
	public function remove_users($id){
		$db = new Database;
		$db->query('DELETE FROM users WHERE id = :id');
		$db->bind(':id', $id);
		$db->execute();
		$check = $db->checkdata();
		if ($check == 1) {
			return true;
		}else{
			return false;
		}

	}
	
	public function update_user(){

	}
	public function view_users()
	{
		$db = new Database;
		$db->query("SELECT * FROM students");
		$data = $db->fetchresult();
		return $data;
	}

// handles fees
	public function add_fees($descrip,$amount,$level){
		$db = new Database;
		$db->query("INSERT INTO fees values(:descrip,:amount,:level,now())");
		$db->bind(':descrip',$descrip);
		$db->bind(':amount',$amount);
		$db->bind(':level',$level);
		$db->execute();
		$check = $db->checkdata();
		if ($check == 1) {
			return true;
		}else{
			return false;
		}
	}
	public static function view_fees($value='')
	{
		$db = new Database;
		if($value == ''){
		$db->query("SELECT * FROM fees");
		}else{
			$db->query("SELECT * FROM fees where level = :level");
			$db->bind(':level',$value);
		}
		
		return $db->fetchresult();
	}
	public function update_fees($descrip,$amount,$level)
	{
		$db = new Database;
		$db->query("UPDATE fees SET descrip = :descrip, amount = :amount, level =  :level where level = :level");
		$db->bind(':level',$level);
		$db->bind(':amount',$amount);
		$db->bind(':descrip',$descrip);
		if($db->execute()){
		return true;	
	}else{
		return false;
	}
		
	}
	public function delete_fees($level)
	{
		$db = new Database;
		$db->query("DELETE FROM fees where level=:level");
		$db->bind(':level',$level);
		$db->execute();
		$check = $db->checkdata();
		if ($check == 1) {
			return true;
		}else{
			return false;
		}

	}
}


 ?>