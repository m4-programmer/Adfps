<?php require_once '../includes/header_one.php'; ?>
<?php 
      // handles form request
      if (isset($_POST['proceed'])) {
       
        //if student has not paid then take him to payment portal
         $session = $_POST['session'];
         $level = $_POST['level'];
         header("location: viewdues.php?session=$session&level=$level");
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
    <li class="breadcrumb-item active" aria-current="page">Pay Dues</li>
  </ol>
</nav>
            
           <?php
            $rows = Student::fetchstudent();
            foreach ($rows as $row ) :
             ?>
            
           <center><h3>Welcome <?php echo $row['fname']." ". $row['oname']." ". $row['lname']. ' - '. $row['stu_regno']; ?> </h3>
            <p><strong>Current Level: </strong><?php echo $row['level'] ?></p>
           </center> 
           <?php endforeach; ?>
             <div class="line"></div>
    <div class="alert alert-info">
       <h4>Dues Payment</h4>
       <p>Select the correct Session and Level you want to pay for </p>
        
      </div>
     
 <div class="line"></div>
<form class="form-horizontal" method="post" action=""> <table class="table table-bordered">
        
        <tbody><tr>
          <td><strong>Select Session</strong><strong></strong></td>
          <td><label for="select"></label>
            <select name="session" id="select" class="form-input">
               <?php 
                $session = Student::fetchsession();
                $curr_session = $session[0]['session'];// set current session to the last inserted session
          $rows = Student::fetchsession();
           foreach($rows as $row):
        ?>

            <option value="<?php echo $row['session']; ?>" <?php if ($row['session'] ==  $curr_session) {?> 
             selected
            <?php  } ?>> <?php echo $row['session']; ?> </option>      
            <?php endforeach; ?>        </select></td>
          </tr>
          <tr>
          <td><strong>Select Level</strong><strong></strong></td>
          <td><label for="select"></label>
            <select name="level" id="select" class="form-input" >
               <?php 
          $rows = Student::getlevel();
         
           foreach($rows as $row):
        ?>

            <option  value="<?php echo $row['level']; ?>" <?php if ($row['level'] == $_SESSION['level']) {?> 
             selected
            <?php  } ?>> <?php echo $row['level']; ?> </option>      
            <?php endforeach; ?> 
            <option style="display: hidden"></option></select></td>
          </tr>
     
          <tr><td colspan="5"><center><div class="form-group">
            <div class="form">
              <button type="submit" class="btn btn-medium btn-primary" name="proceed">Proceed <i class="icon-arrow-right"></i></button>  
              </div>
            </div>
            </center>
            </td>
          </tr>
      </tbody></table></form>
      
   

      
          

           

    <?php require_once '../includes/scripts.php'; ?>