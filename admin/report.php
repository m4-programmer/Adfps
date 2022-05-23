<?php 
    require_once 'includes/header.php';
  ?>
   <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php require_once 'includes/sidebar.php' ?>

        <!-- Page Content Holder -->
        <?php require_once '../includes/page_header.php'; ?>
           <nav aria-label="breadcrumb" style="margin-top: -20px">
           	<ol class="breadcrumb">
    <h4>Payment <em style="color:black"> Reports</em></h4>
  </ol>
</nav>


  
            <div class="form-holder">
					<table class="table table-bordered table-stripped"> 
					<tbody><tr>
						<td><strong>S/N</strong></td> 
						<td><strong>Ref. No</strong></td> 
						<td><strong>Name</strong></td> 
						<td><strong>Reg. No</strong></td>
						<td><strong>Level</strong></td> 
						<td><strong>Session</strong></td>
										 
						<td><strong>Paid</strong></td>  
						<td><strong>Date Paid</strong></td> 
						
					</tr>
					<?php $rows = Admin::paymentreport();
					$i = 1;
					foreach ($rows as $row): ?>
			<tr>
				
						<td><?php echo $i++;?></td>


						<td><?php echo $row['ref_id'];?></td> 

						<td><?php echo $row['fname'].' '. $row['oname'].' '. $row['lname']; ?></td> 
						<td><?php echo $row['stu_regno'];;?></td> 
						<td><?php echo $row['level'];;?></td> 
						<td><?php echo $row['session'];;?></td> 
						
						<td><?php echo $row['amount_paid'];;?></td> 
						<td><?php echo date($row['date_paid']); ?></td> 
						
						
					<?php endforeach; ?>
					</tr>
				</tbody>
			</table>
		</div>
            <hr>
           
        

    <?php require_once '../includes/scripts.php'; ?>