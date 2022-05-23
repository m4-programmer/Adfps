<?php require_once '../includes/header_one.php'; ?>
<?php 
//handles profile updates
if (isset($_POST['btn'])) {
    $email = $_POST['email'];
     $level = $_POST['level'];
    $session = $_POST['session']; 
    $result  = Student::update_profile($email,$level,$session);
 if ($result == true) {
        header("location: profile.php?update successful");
    }else{
                header("location: profile.php?update error");

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
    <li class="breadcrumb-item active" aria-current="page">My Profile</li>
  </ol>
</nav>
            <?php
            $rows = Student::fetchstudent();
            
            foreach ($rows as $row ) :
             ?>
            
           <h3 style="color: #d64"  ><center>Welcome <?php echo $row['fname']." ". $row['oname']." ". $row['lname']. ' - '. $row['stu_regno']; ?> </center> </h3>
            <div class="card">
  <div class="card-header">
   
  </div>
  <div class="card-body jumbotron">
    <form action=" " method="post">
        <p> <center><b>STUDENT BIODATA</b></center></p>
    	<div class="form-group">
    		<label>Registration Number:</label>
    		<input type="text" name="regno" value="<?php echo $row['stu_regno']; ?>" disabled class="form-input">
    	</div>
    	<div class="form-group">
    		<label>
Fullnames
:</label>
    		<input type="text" name="regno" value="<?php echo $row['fname']." ". $row['oname']." ". $row['lname']; ?>" disabled class="form-input">
    	</div>
    	<div class="form-group">
    		<label>Course of Study:</label>
    		<input type="text" name="regno" value="<?php echo $row['dept']; ?>" disabled class="form-input">
    	</div>
    	  	<div class="form-group">
    		<label>Faculty:</label>
    		<input type="text" name="regno" value="<?php echo $row['faculty']; ?>" disabled class="form-input">
    	</div>
    	<div class="form-group">
    		<label>
Department
:</label>
    		<input type="text" name="regno" value="<?php echo $row['dept']; ?>" disabled class="form-input">
    	</div>
    	<div class="form-group">
    		<label>
Entry Year
:</label>
    		<input type="text" name="yr" value="<?php echo $row['entry_year']; ?>" disabled class="form-input">
    	</div>
        <div class="form-group">
            <label>
Current Year
:</label>
            <input type="text" name="session" value="<?php echo $row['curr_year']; ?>"  class="form-input">
        </div>
    	<div class="form-group">
    		<label>
Gender
:</label>
    		<input type="text" name="gender" value="<?php echo $row['gender']; ?>" disabled class="form-input">
    	</div>
            <div class="form-group">
            <label>
Email
:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-input">
        </div>
    	<div class="form-group">
    		<label>Level
:</label>
    		<input type="text" name="level" value="<?php echo $row['level']; ?>" class="form-input">
    	</div>
    
   <center> <button class="btn btn-primary" name="btn">Update</button></center>
    </form>
  </div>
</div>

<?php endforeach; ?>

            <div class="line"></div>

    <?php require_once '../includes/scripts.php'; ?>