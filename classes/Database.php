<?php 

/**
 * 
 */
class Database 
{
	private $dbhost = "localhost";
	private $dbuser = "root";
	private $dbname = "adfps";
	private $dbpword = "";

	private $error;
	private $dbh;
	private $stmt;
	function __construct()
	{
		$conn = "mysql: host=".$this->dbhost.";dbname=".$this->dbname;
		$options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

		try {
			$this->dbh = new PDO($conn, $this->dbuser,$this->dbpword,$options);
		} catch (PDOEception $e) {
			$this->error = $e->getMessage();
		}
	}
	public function database(){
				$conn = "mysql: host=".$this->dbhost.";dbname=".$this->dbname;
		$options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

		try {
			$this->dbh = new PDO($conn, $this->dbuser,$this->dbpword,$options);
		} catch (PDOEception $e) {
			$this->error = $e->getMessage();
		}
	}
	public function query($query){
		
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($params,$value, $type=null)
	{
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}
		$this->stmt->bindValue($params,$value,$type);
	}
	public function execute()
	{
		return $this->stmt->execute();
	}
	public function fetchresult(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function lastinsertid(){
		return $this->dbh->lastInsertId();
	}
	public function checkdata(){
		return $this->stmt->rowCount();
	}

}
 ?>