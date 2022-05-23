<?php require_once '../includes/header_one.php'; ?>

 <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php require_once '../includes/sidebar.php' ?>

        <!-- Page Content Holder -->
        <?php require_once '../includes/page_header.php'; ?>
        <h3>  Welcome  <b>Adolphus</b> Miracle Oluebube - 2017/243699</h3>
             <hr class="soft">
    <div class="alert alert-info">
       <h4>Dues Payment History</h4>
       <p>
         You are Currently in<b>
           2020/2021 Session</b>
           
         </p>
         
       </div>
<form class="form-horizontal" method="post" action="#"> <table class="table table-bordered table-responsived">
        <tbody><tr>
          <th colspan="4"> PAYMENT HISTORY </th>
        </tr>
        <tr>
          <td width="3%"><strong>S/N
          </strong></td>
          <td width="7%"><strong>Session</strong></td>
          <td width="14%"><strong>Due Name</strong></td>
          <td width="14%"><strong>Payment Level</strong></td>
          <td width="14%"><strong>TransNo</strong></td>
          <td width="5%"><strong>Payment Date</strong></td>
          <td width="14%"><strong></strong></td>
        </tr>
        <?php $rows = Student::fees_history(); $i = 1; foreach($rows as $row):?>
        <tr>
          <td width="3%"><?php echo $i++; ?>
          </td>
          <?php $_SESSION['amount_paid'] = $row['amount_paid'] ?>
          <td width="7%"><?php echo $_SESSION['session_paid'] = $row['session']; ?></td>
          <td width="14%">Nacoss Dues</td>
          <td width="14%"><?php echo $row['level'];  ?> level</td>
          <td width="14%"><?php echo $row['ref_id']; ?></td>
          <td width="5%"><?php echo $_SESSION['date_paid']=$row['date_paid']; ?></td>
          <td width="14%"><a class="btn btn-success" href="reciept.php">View</a></td>
        </tr>
      <?php endforeach; ?>
        
      
    </tbody></table></form>
          

           

    <?php require_once '../includes/scripts.php'; ?>