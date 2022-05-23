<?php require_once '../includes/header_one.php';
// authenticates fees payment
 //check if student has paid fees before and display the receipt
        if(Student::checkFeeStatus($_GET['session'],$_GET['level']) == true){
          header("Location: pay_history.php");
        }
if (isset($_POST['fee'])) {
          $payfees = Student::payfees($_GET['session']);
          if ($payfees == true) {
          header("Location: reciept.php");
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
    <li class="breadcrumb-item " aria-current="page">Pay Due</li>

  <li class="breadcrumb-item active" aria-current="page">View Fee</li>
  </ol>
</nav>
You have selected to pay dues for <?php $session= $_GET['session']; echo "<b>$session</b>";   ?> session
            <?php
            $rows = Student::fetchstudent();
            foreach ($rows as $row ) :
             ?>
            
           <h3><center>Welcome <?php echo $row['fname']." ". $row['oname']." ". $row['lname']. ' - '. $row['stu_regno']; ?> </center> </h3>      
         <?php endforeach; 
         $rows = Student::viewfees();
         
         foreach($rows as $row):?>
            <div class="line"></div>
<form class="form-horizontal" method="post" action=""> <table class="table table-bordered">
            <tbody><tr>
              <th colspan="5"><div class="row"><div class="col-md-3">DUES DETAILS</div>
              <div class="col-md-5">Invoice Date: <?php $data = strtotime($row['date_generated']); echo '<i style="font-weight: light">'.date('d/m/Y',$data).'</i>'; ?></div>
              <div class="col-md-4">RRR: <?php echo '<em>'.$row['ref_id'].'</em>'; ?></div></div>
                
              </th>

            </tr>
            <tr>
              <td width="20%"><strong>S/N
              </strong></td>
              <td width="20%"><strong>Due Name</strong></td>
              <td width="20%"><strong>Session</strong></td>
              <td width="20%"><strong>Level</strong></td>
              <td width="20%"><strong>Amount</strong></td>
              
            </tr>
            
                                                   <tr> 
              <td>1</td> 
              <td><?php echo $row['descrip']; ?></td>
              <td><?php echo $_SESSION['session'] = $_GET['session']; ?></td>
              <td><?php echo $_SESSION['level'] = $_GET['level']; ?></td>
              <td><?php echo $_SESSION['amount_paid'] = $row['amount']; ?></td>


             
            </tr> 
                      
          <tr>
           

     
         </tr>
         <tr><td colspan="5"><div class="control-group">
          <div class="controls">
            <center>
           <h4 style="padding-right:200px;"> 
            <button type="submit" name="fee" class="btn btn-medium btn-success">  Pay Now <i class="icon-arrow-right"></i></button> 
          </h4></center>
        </div>
      </div>

    </td>
  </tr>
</tbody></table></form>
<?php endforeach; ?>
    <?php require_once '../includes/scripts.php'; ?>