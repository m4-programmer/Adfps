<?php 
    require_once 'includes/header.php';
  ?>
   <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php require_once 'includes/sidebar.php' ;
// adds lecturer 
        if (isset($_POST['add'])) {
    	$name = $_POST['name'];
    	$pword = $_POST['pword'];
    	$uname = $_POST['uname'];
    	$add = Admin::addlecturers($name,$uname,$pword);
    	if ($add == true) {
    		header("location: lecturers.php");
    	}
    }

     if(isset($_POST['delete'])){
	$delete_id = $_POST['delete_id'];
	$result = Admin::remove_users($delete_id);
	if ($result == true ) {
		$msg = '<p class="text-success"> File deleted successfully </p>';
	}
}
        ?>

        <!-- Page Content Holder -->
        <?php require_once '../includes/page_header.php'; ?>
           <nav aria-label="breadcrumb" style="margin-top: -20px">

</nav>
<ol class="breadcrumb">
    <h4>Lecturers <em style="color:black"> Record</em></h4>
  </ol>
<?php  if(isset($msg)){
echo $msg;}
 ?>
    <a class="btn btn-primary pull-right" href="lecturers.php?status=add_lecturer" style="margin: 10px">Add Lecturers</a>
            <div class="form-holder">
					<table class="table table-bordered table-stripped"> 
					<tbody><tr>
						<td><strong>S/N</strong></td> 
						<td><strong>Full Name</strong></td>
						<td><strong>Username</strong></td> 
						<td><strong>Description</strong></td>  
						<td><strong>Date Created</strong></td> 
						<td><strong>Action</strong></td>
					</tr>
					<?php $rows = Admin::viewlecturers();
					$i = 1;
					foreach ($rows as $row): ?>
			<tr>
				
						<td><?php echo $i++;?></td>


						<td><?php echo $row['name'];?></td> 

						<td><?php echo $row['username']; ?></td> 
						<td><?php echo "Lecturer";?></td> 
						<td><?php echo date($row['date_created']); ?></td> 
						
						<td><center><form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<input type="hidden"  name="delete_id" value="<?php echo $row['id']; ?>">
			<input type="submit" class="btn btn-danger " name="delete" value="Delete" />
		</form> </center></td>
					<?php endforeach; ?>
					</tr>
				</tbody>
			</table>
		</div>
            <hr>
           <?php 
if (isset($_GET['status'])):
	
 ?>
 <div class="jumbotron" style="width: 70%; margin-left: 11em;padding: 10px" >
 	<center><h4>Add Lecturer</h4></center>

        <form method="post" action="">
  <div class="form-group">
    <label >Name</label>
    <input type="text" name="name"  class="form-control" >
      </div>
  <div class="form-group">
    <label >Username</label>
    <input type="text" name="uname" class="form-control" >
  </div>
  <div class="form-group">
    <label >Password</label>
    <input type="Password" name="pword" class="form-control" >
    
  </div>
  

  <center><button type="submit" name="add" class="btn btn-primary">Add</button></center>
</form>     
 </div>       
 <?php echo @$_GET['errmsg']; endif; ?>
        

    <?php require_once '../includes/scripts.php'; ?>