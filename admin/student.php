<?php 
    require_once 'includes/header.php';
  ?>
   <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php require_once 'includes/sidebar.php' ?>

        <!-- Page Content Holder -->
        <?php require_once '../includes/page_header.php'; 
        if(isset($_POST['delete'])){
	$delete_id = $_POST['delete_id'];
	$delete = Admin::deleteStudent($delete_id);
	if ($delete == true) {
		$msg = "<script> alert('User Deleted Successfully')</script>";
	}
	
}
    
        ?>
        <script type="text/javascript"></script>
           <nav aria-label="breadcrumb" style="margin-top: -20px">

</nav>
<ol class="breadcrumb">
    <h4>Students <em style="color:black"> Record</em></h4>
  </ol>

  <a class="btn btn-primary pull-right" href="add_student.php" style="margin: 10px">Add Student</a><br>
  <?php //echo $msg; ?>
            <div class="form-holder">
					<table class="table table-bordered table-stripped"> 
					<tbody><tr>
						<td><strong>S/N</strong></td> 
						<td><strong>Reg No</strong></td> 
						<td><strong>Full Name</strong></td>
						<td><strong>Current Level</strong></td>  
						<td><strong>Personal Information</strong></td> 
						<td><strong>Others</strong></td> 
						<td><strong>Action</strong></td>
					</tr>
					<?php $rows = Admin::view_users();
					$i = 1;
					foreach ($rows as $row): ?>
			<tr>
				
						<td><?php echo $i++;?></td>

						<td class="text-danger"><?php echo $row['stu_regno'];?></td> 

						<td><?php echo $row['fname'].' '. $row['oname'].' '. $row['lname']; ?></td> 
						<td><?php echo $row['level']; ?></td> 
						<td>
							<p><small>Email: <i><b><?php echo $row['email'] ?></i></small></p>
							<p><small>Gender: <i><b><?php echo $row['gender'] ?></i></small></p>
			     			<p><small>DOB: <i><b><?php echo $row['dob'] ?></i></small></p>
						</td> 
						<td>
							<p><small>Session: <i><b><?php echo $row['curr_year'] ?></i></small></p>
							<p><small>Entry Year: <i><b><?php echo $row['entry_year'] ?></i></small></p>
			     			<p><small>Dept: <i><b><?php echo $row['dept'] ?></i></small></p>
						</td>

						<td><center><form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<input type="hidden"  name="delete_id" value="<?php echo $row['id']; ?>">
			<input type="submit" class="btn btn-danger " name="delete" value="Delete" />
		</form> 
		
		 </center></td>
					<?php endforeach; ?>
					</tr>
				</tbody>
			</table>
		</div>
            <hr>
           
        

    <?php require_once '../includes/scripts.php'; ?>