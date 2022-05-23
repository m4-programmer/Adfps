<?php 
ob_start();
@session_start();
function __autoload($file){
	require_once "classes/$file.class.php"; 
	echo "$file.class";
}
function insert($table, $title,$body){
	echo ("INSERT INTO $table (title,body) values ($title,$body) ");
	for ($i=0; $i < ; $i++) { 
		# code...
	}
}
function bindinsert($param,$values){
	echo()
}
 insert("posts",":title",":body");
	//echo "class";
 ?>