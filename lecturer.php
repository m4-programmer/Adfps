<?php 
require_once "classes/Database.php";
    require_once "classes/Login.php";
    require_once 'classes/Student.php';
    require_once 'classes/Admin.php';
    require_once 'classes/Lecturer.php';
    require_once 'includes/header.php';
    
if (!Login::loggedIn()) {
   header("location: ./");
}
echo "welcome ". $_SESSION['lecturer']; ?>
   
    



  <?php //require_once '../includes/scripts.php'; ?>
