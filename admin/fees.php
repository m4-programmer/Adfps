<?php 
    require_once 'includes/header.php';
    if (isset($_POST['update'])) {
    	$descrip = $_POST['descrip'];
    	$level = $_POST['level'];
    	$amount = $_POST['amount'];
    	$update = Admin::update_fees($descrip,$amount,$level);
    	if ($update == true) {
    		header("location: fees.php");
    	}
    }
      if (isset($_POST['add'])) {
    	$descrip = $_POST['descrip'];
    	$level = $_POST['level'];
    	$amount = $_POST['amount'];
    	$update = Admin::add_fees($descrip,$amount,$level);
    	if ($update == true) {
    		header("location: fees.php");
    	}
    }

     if(isset($_POST['delete'])){
	$delete_id = $_POST['delete_id'];
	$delete = Admin::delete_fees($delete_id);
	if ($delete == true) {
		$msg = "Fees Deleted Successfully";
	}
	
}
if(isset($_POST['edit'])){
	$edit_id = $_POST['delete_id'];
	//echo  $edit_id;
	header("Location: fees.php?id=$edit_id");
}
  ?>
   <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php require_once 'includes/sidebar.php' ?>

        <!-- Page Content Holder -->
        <?php require_once '../includes/page_header.php'; ?>
           <nav aria-label="breadcrumb" style="margin-top: -20px">
           	<ol class="breadcrumb">
    <h4>Fees <em style="color:black"> Records</em></h4>
  </ol>
</nav>

<?php if (isset($msg)) {
 ?>
 <script type="text/javascript">alert("<?php echo($msg) ?>")</script>
<?php } ?>
  <a class="btn btn-primary float-right" href= "fees.php?status=addfees">Add Fees</a><br>
  <p></p>
            <div class="form-holder">
					<table class="table table-bordered table-stripped"> 
					<tbody><tr>
						<td><strong>S/N</strong></td> 
						<td><strong>Description</strong></td>
						<td><strong>Amount</strong></td> 
						<td><strong>Level</strong></td>  
						<td><strong>Date Created</strong></td> 
						<td><strong>Action</strong></td>
					</tr>
					<?php $rows = Admin::view_fees();
					$i = 1;
					foreach ($rows as $row): ?>
			<tr>
				
						<td><?php echo $i++;?></td>


						<td><?php echo $row['descrip'];?></td> 

						<td><?php echo $row['amount']; ?></td> 
						<td><?php echo $row['level'];;?></td> 
						<td><?php echo date($row['date_created']); ?></td> 
						
						<td><center><form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<input type="hidden"  name="delete_id" value="<?php echo $row['level']; ?>">
			<input type="submit" class="btn btn-danger " name="delete" value="Delete" />
			<input type="submit" class="btn btn-success " name="edit" value="Edit" />
		</form> </center></td>
					<?php endforeach; ?>
					</tr>
				</tbody>
			</table>
		</div>
            <hr>
<?php 
if (isset($_GET['id'])):
	
 ?>
 <div style="width: 70%; margin-left: 11em">
 	<center><h4>Edit Fees</h4></center>
 	<?php $rows = Admin::view_fees($_GET['id']); foreach($rows as $row):?>
        <form method="post" action="">
  <div class="form-group">
    <label >Description</label>
    <input type="text" name="descrip" value="<?php echo $row['descrip'] ?>" class="form-control" >
      </div>
  <div class="form-group">
    <label >Amount</label>
    <input type="text" name="amount" value="<?php echo $row['amount'] ?>" class="form-control" >
  </div>
  <div class="form-group">
    <label >Level</label>
    <input type="text" name="level" value="<?php echo $row['level'] ?>" class="form-control" >
    <small class="text-danger"><?php echo @$_GET['errmsg']; endforeach; ?></small>
  </div>

  <center><button type="submit" name="update" class="btn btn-primary">Update</button></center>
</form>     
 </div>       
<?php endif; ?>

<?php 
if (isset($_GET['status'])):
	
 ?>
 <div style="width: 70%; margin-left: 11em">
 	<center><h4>Add Fees</h4></center>

        <form method="post" action="">
  <div class="form-group">
    <label >Description</label>
    <input type="text" name="descrip"  class="form-control" >
      </div>
  <div class="form-group">
    <label >Amount</label>
    <input type="text" name="amount" class="form-control" >
  </div>
  <div class="form-group">
    <label >Level</label>
    <input type="text" name="level" class="form-control" >
    <small class="text-danger"></small>
  </div>

  <center><button type="submit" name="add" class="btn btn-primary">Add</button></center>
</form>     
 </div>       
<?php echo @$_GET['errmsg']; endif; ?>
    <?php require_once '../includes/scripts.php'; ?>