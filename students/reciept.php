  <?php require_once '../includes/header_one.php'; ?>
<style type="text/css">
  .card {
    border: 1px solid #ddd;
  }
  .stu_details{
    margin-left: 100px;
    margin-top: 10px;
  }
  span  {
    margin-left: 30px;
    text-transform: uppercase;
    font: courier;

  }

</style>
 <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php require_once '../includes/sidebar.php' ?>

        <!-- Page Content Holder -->
        <?php require_once '../includes/page_header.php'; ?>
        
      <div class="card print-data" style="padding: 10px">
        <center><h2><small>COMPUTER SCIENCE DEPARTMENT</small></h2>
                <h3>OFFICIAL FEE RECEIPT</h3>
        </center>
        <?php 
        $date = strtotime($_SESSION['date_paid']);
        $mdate = date('d/m/Y',$date);
         ?>
    
        <table class="table table-bordered">
        
        <tbody><tr>
          <td><b>Received From:</b> </td>
          <td>    <span><?php echo $_SESSION['fullname'] ?></span>       </td>
          </tr>
          <tr>
          <td><b>Reg. No:</b></td>
          <td><span><?php echo $_SESSION['regno'] ?></span></td>
          </tr>
          <tr>
          <td><b>The Sum Of:</b></td>
          <td><span><?php echo $_SESSION['amount_paid'] ?></span></td>
          </tr>
           <tr>
          <td><b>For:</b></td>
          <td><span><?php echo "Nacoss Dues"; ?></span></td>
          </tr>
          <tr>
          <td><b>Session:</b></td>
          <td><span><?php echo $_SESSION['sessions'] ?></span></td>
          </tr>
          <tr>
          <td><b>Date Paid:</b></td>
          <td><span><?php echo $mdate ?></span></td>
          </tr>
     </div>
          <tr><td colspan="5"><center><div class="form-group">
            <div class="form">
              <button type="submit" class="btn btn-medium btn-primary print-p-data" >Print <i class="icon-arrow-right"></i></button>  
              </div>
            </div>
            </center>
            </td>
          </tr>
      </tbody></table>
             
      <script type="text/javascript">
      
        $(document).ready(function(){
          $(".print-p-data").click(function(){
        print(".print-data"); 
    });
//$("body").on("click", ".print-p-data", function(){
        
   //       });
          });
      </script>    

           

    <?php require_once '../includes/scripts.php'; ?>