<?php 
    require_once '../includes/header_one.php'; ?>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php require_once '../includes/sidebar.php' ?>

        <!-- Page Content Holder -->
        <?php require_once '../includes/page_header.php'; ?>
           <nav aria-label="breadcrumb" style="margin-top: -20px">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>
            <?php
         
          $rows = Student::fetchstudent();
            foreach ($rows as $data ) :
                $_SESSION['level'] = $data['level'];
               
             ?>
            <h3 style="color: #d64"><center>Welcome <?php echo $_SESSION['fullname'] = $data['fname']." ". $data['oname']." ". $data['lname'];
             echo ' - <i>'. $data['stu_regno']; ?></i> </center> </h3>
            <div class="row text-center">

            	                      
            	<div class="col-md-4 col-xs-4 col-sm-4">
            		<strong>Level: </strong> <?php echo $data['level']; ?>								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
								
								
            	</div>
            	<div class="col-md-4 col-sm-4 col-xs-4">
            		<strong>Department: </strong> <?php echo $data['dept']; ?>								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            	</div>
            	<div class="col-md-4 col-sm-4 col-xs-4">
            		<strong>Faculty: </strong> <?php echo $data['faculty']; ?> 
            		<?php  ?>
            	</div>
            	
            <?php endforeach;?>
            	
            	

            </div>
            <hr>
            <div class="alert alert-info ">

			<strong>Welcome to the DUES e-Payment Platform!</strong> <br>
			You are Currently in<b>
			2020/2021 Session</b>
		<br>Please use the left navigation menu to access functionalities in the portal.
									</div>
           	<div class="alert alert-warning">

				<strong><u>NOTICES!</u> 
				<br> 1. Always Remember to  Update your level according to the Session before making Any payment</strong>
				<br> 2. Always ensure that your email address is correct and active before making Any payment
				<br> 3. For help and support, kindly send a mail to <strong>computerscience@pay.ng</strong>. For payment issues, send a mail to <strong>dues@pay.ng</strong>
			</div>


          

            <div class="line"></div>

    <?php require_once '../includes/scripts.php'; ?>