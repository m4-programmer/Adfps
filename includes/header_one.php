<?php 
    require_once "../classes/Database.php";
    require_once "../classes/Login.php";
    require_once '../classes/Student.php';
    require_once '../classes/Admin.php';
    require_once '../classes/Lecturer.php';
if (!Student::loggedIn()) {
   header("location: ../");
}
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Computer Science Department Fees Payment Portal::.</title>

    <!-- Bootstrap CSS CDN -->
   <link rel="stylesheet" type="text/css" href="../stylesheet/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../style5.css">

    <!-- Font Awesome JS -->
    <script type="text/javascript" src="../stylesheet/js/jquery.js"></script>
    <script type="text/javascript" src="../stylesheet/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body style="background-color: white">