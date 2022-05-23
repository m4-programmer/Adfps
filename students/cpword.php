<?php require_once '../includes/header_one.php'; ?>
<?php 
if (isset($_POST["change"])) {
    $old = $_POST['old'];
    $pword = $_POST['pword'];
    $confirm = $_POST['confirm'];
    if ($confirm != $pword) {
        header("location: cpword.php?errmsg=Password does not match");
    }else{
        $get = Student::cpword($pword,$old);
        if ($get == true) {
            header("location: cpword.php?msg=Password Changed Successfully");
        }else{
            header("location: cpword.php?msg= Opps Password could not be Changed");
        }
    }
}
 ?>

 <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php require_once '../includes/sidebar.php' ?>

        <!-- Page Content Holder -->
        <?php require_once '../includes/page_header.php'; ?>
         <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item " aria-current="page">Profile</li>

  <li class="breadcrumb-item active" aria-current="page">Change Password</li>
  </ol>
</nav>


            <?php
            $rows = Student::fetchstudent();
            foreach ($rows as $row ) :
             ?>
            
           <h3 style="color: #d64"><center>Welcome <?php echo $row['fname']." ". $row['oname']." ". $row['lname']. ' - '. $row['stu_regno']; ?> </center> </h3>      
         <?php endforeach; ?>
 <div class="line"></div>
 <div class="jumbotron">
    <center><h4>Change Password</h4></center>
    <form method="post" action="">
     
  <div class="form-group">
    <label >Enter Old Password</label>
    <input type="password" name="old" class="form-control"  aria-describedby="password">
    <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
  </div>
  <div class="form-group">
    <label >Enter New Password</label>
    <input type="password" name="pword" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
    <label >Confirm New Password</label>
    <input type="password" name="confirm" class="form-control" id="exampleInputPassword1">
    <small class="text-danger"><?php echo @$_GET['errmsg']; ?></small>
  </div>

  <center><button type="submit" name="change" class="btn btn-primary">Submit</button></center>
</form>     
    
     
 </div>

<script type="text/javascript">
  <?php if (isset($_GET['msg'])) {
   
   ?>
    alert("<?php echo @$_GET['msg']; ?>");
    <?php } ?>
</script>

           

    <?php require_once '../includes/scripts.php'; ?>