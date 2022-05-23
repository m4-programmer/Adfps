<?php 
    require_once 'includes/header.php';
  ?>
  <style type="text/css">
      
.inner-panel {
    border: 1px solid #d64;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    background: rgba(255, 255, 255, 0.8);
    margin-bottom: 15px;
}

.inner-panel h3{
    font-size: 19px;
    margin: 0 0 10px 0;
    color: #d64;
    font-weight: bold; 
}

.inner-panel span{
    color: #ED2124;
    font-size: 35px; 
    font-weight: bold;
}

.inner-panel a{
    display: block;
    font-size: 15px;
}
  </style>


    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php require_once 'includes/sidebar.php' ?>

        <!-- Page Content Holder -->
        <?php require_once '../includes/page_header.php'; ?>
           <nav aria-label="breadcrumb" style="margin-top: -20px">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>
            <h3 style="color:#d64"><center>Welcome <?php echo ucfirst($_SESSION['admin']); ?> </center> </h3>
         
            <hr>
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 card">
                    <div class='inner-panel'> 
                    <h3>Students</h3>
                    <span class='d-count'><?php echo Admin::students(); ?></span>
                    <a href='student.php'>View &#8594;</a>
                </div> 
                    
                </div>
                <div class="col-md-3">
                    <div class='inner-panel'> 
                        <h3>Lecturers</h3>
                        <span class='d-count'><?php echo count(Admin::viewlecturers()); ?></span>
                        <a href='lecturers.php'>View &#8594;</a>
                    </div> 
                </div>
                <div class="col-md-3">
                    
                    <div class='inner-panel'> 
                        <h3>Fees</h3>
                        <span class='d-count'><?php echo Admin::fees(); ?></span>
                        <a href='fees.php'>View &#8594;</a>
                    </div>
                </div>
                <div class="col-md-3">
                    
                    <div class='inner-panel'> 
                        <h3>Payment report</h3>
                        <span class='d-count'><?php echo count(Admin::paymentreport()); ?></span>
                        <a href='report.php'>View &#8594;</a>
                    </div>
                </div>
                  <!-- <div class="col-md-3">
                 
                    <div class='inner-panel'> 
                        <h3>Set Session</h3>
                        <a href='setsession.php'>View &#8594;</a>
                    </div>
                </div>
            -->
                 <div class="col-md-3">
                    
                    <div class='inner-panel'> 
                        <h3>Change Password</h3>
                        <a href='cpword.php'>View &#8594;</a>
                    </div>
                </div>

            </div>
            </div>
        

    <?php require_once '../includes/scripts.php'; ?>