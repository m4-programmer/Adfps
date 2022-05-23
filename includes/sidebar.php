<nav id="sidebar">
            <div class="sidebar-header">
                <?php
         
          $rows = Student::fetchstudent();
            foreach ($rows as $data ) :

             ?>
                <img src="" class="img-responsive">
                <h3 style="color: #d64"><?php echo $data['fname']." ". $data['oname']." ". $data['lname']. ' <br><i>('. $data['stu_regno']; ?>)</br></i></h3>
            </div>
        <?php endforeach;?>

            <ul class="list-unstyled components">
                <p>Portal</p>
                <li>
                    <a href="index.php">Home</a>

                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Profile</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="cpword.php">Change Password</a>
                        </li>
                        <li>
                            <a href="profile.php">Student profile details</a>
                        </li>
                    </ul>
                </li>
             
                <li>
                    <a href="makepayment.php">Pay dues</a>
                </li>
                <li>
                    <a href="pay_history.php">Payment History</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>

            
        </nav>