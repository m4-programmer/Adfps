
<?php 
    require_once 'includes/header.php';
 $dat = Admin::getRegNo();
 $data = ++$dat;
    if (isset($_POST['add'])) {
    	// collects the users data
    	 $fname = $_POST["fname"];
    	 $mname = $_POST["mname"];
    	 $lname = $_POST["lname"];
    	 $dob = $_POST["dob"];
    	 $regno = $data;
    	 $email = $_POST["email"];
    	 $dept = "Computer Science";
    	 $level = $_POST["level"];
    	 $entry = $_POST["entry"];
    	 $gender = $_POST["gender"];
    	 $curr_year = $_POST["curr_year"];
    	 // creates users
    	 $creat_user = Admin::create_User($fname,$mname,$lname,$regno,$email,$dob,$dept,$level,$entry,$curr_year,$gender);
  
    }
  
  ?>
   <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php require_once 'includes/sidebar.php' ?>

        <!-- Page Content Holder -->
        <?php require_once '../includes/page_header.php'; ?>
           <nav aria-label="breadcrumb" style="margin-top: -20px">

</nav>
<ol class="breadcrumb">
    <h4>Add <em style="color:black"> Students</em></h4>
    <?php echo $msg =@$_GET['msg'];
    if (isset($msg)) {
     ?>
    <script type="text/javascript">
    	alert("<?php echo $msg; ?>")
    </script>
    <?php } ?>
  </ol>
     	<a class="btn btn-primary pull-right" href="Student.php">View Students</a>
            <hr>
           <form class="" method="post" action="">
	<p ><b class="text-danger">Note: </b >Default password for student will be same as reg no</p>

	<div class="divide"></div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01"  >First Name</label>
      <input type="text" class="form-control "  name="fname" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Middle name</label>
      <input type="text" class="form-control" name="mname" required>
    </div>
     <div class="col-md-4 mb-3">
      <label for="validationCustom02">Last name</label>
      <input type="text" class="form-control" name="lname">
    </div>
  </div>
  <div class="form-row">
  	<div class="col-md-3">
   	<label for="validationCustom02">Date of Birth</label>
   	 <input type="date" name="dob" class="form-control" required>
   </div>
   <div class="col-md-3">
   	<label for="validationCustom02">Student Reg No.</label>
   	 <input type="text" name="regno" value="<?php echo $data; ?>" style="color:blue" class="form-control" disabled>
   </div>
   <div class="col-md-3">
   	<label for="validationCustom02">Email</label>
   	 <input type="email" name="email" class="form-control "  required>
   </div>
   <div class="col-md-3">
   	<label for="validationCustom02">Department</label>
   	 <input type="text" name="dept" value="Computer Science"   class="form-control" disabled>
   </div>
   
  </div>
  <!-- third row -->
  <div class="form-row">
  	<div class="col-md-3">
   	<label for="validationCustom02">Level</label>

   	 <select name="level" class="custom-select" style="width: 100%" required>
 		<option selected>...</option>
 		   	<?php $rows = Student::getlevel(); foreach($rows as $row): ?>
 		<option><?php echo $row['level']; ?></option>
 		<?php endforeach; ?>
	</select>

   </div>
   <div class="col-md-3">
   	<label for="validationCustom02">Entry Year</label>
   	<input type="text" name="entry" class="form-control" placeholder="E.g 2017/2018" required>
   </div>	
   <div class="col-md-3">
   	<label for="validationCustom02">Gender</label>
   	<select name="gender" class="custom-select" style="width: 100%" required>
 		<option selected>...</option>
  		<option value="male">Male</option>
  		<option value="male">Female</option>
	</select>
   </div>
   <div class="col-md-3">
   	<label for="validationCustom02">Current Year</label>
   	<input type="text" name="curr_year" class="form-control" placeholder="E.g 2017/2018" required>
   </div>	
   
 </div>

 <center><button name="add" class="btn btn-success" style="margin: 15px">Add Student</button></center>
 
            </form>
           
        

    <?php require_once '../includes/scripts.php'; ?>