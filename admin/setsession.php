<?php 
    require_once 'includes/header.php';
    if(isset($_POST['delete'])){
    $delete_id = $_POST['delete_id'];
    $delete = Admin::deleteSession($delete_id);
    
}
    
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
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>


         
           <a class="btn btn-primary float-right" href= "add_fees.php">Add Session</a><br>
           <p></p>
            <div class="form-holder">
                    <table class="table table-bordered table-stripped"> 
                    <tbody><tr>
                        <td><strong>S/N</strong></td> 
                        <td><strong>Sessions</strong></td>
 
                        <td><strong>Action</strong></td>
                    </tr>
                    <?php 
                    if (isset($delete) == true) {
        $msg = " Session Deleted Successfully";
        if (isset($msg)) {
            echo $msg;    # code...
        }
        
    }
                    $i = 1;
                    $session = Student::fetchsession();
                    
                    foreach ($session as $row): ?>
            <tr>            
                        <td><?php echo $i++;?></td>
                        <td><?php echo $row['session'];?></td>                       
                        <td><center><form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input type="hidden"  name="delete_id" value="<?php echo $row['session']; ?>">
            <input type="submit" class="btn btn-danger " name="delete" value="Delete" />
        </form> 
                            <a href="add-doctors.php?token=12345aedsfetegrf">Edit</a></center></td>
                    <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>
            <hr>
        

    <?php require_once '../includes/scripts.php'; ?>
    <!-- Modal -->
<div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>