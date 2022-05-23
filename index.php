<?php 
	require_once 'includes/header.php';
	require_once 'require.php';

	if (isset($_POST['login'])) {
		$regno = $_POST['regno'];
		$pword = $_POST['pword'];

		Login::Authstudents($regno,$pword);
		
	}

	 ?>
	 <div class="">
	 <nav role="navigation" class="container navbar navbar-default real-nav" style="margin-top: 10px;background-color: #333;" >
    
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">
            	<!--<img src='images/hospital-logo.png' class='img-responsive img-logo' style="height: 50px; margin-bottom: 100px;" />-->
            COMPUTER SCIENCE DEPARTMENT FEE PORTAL</a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
      
            <ul class="nav navbar-nav navbar-right">
               <li><a href='#'>About</a></li>
          <li> <a class="nav-link" href="#" style="">Payment Instructions</a></li>
            </ul>
            
        </div>
    </div>
</nav>

				
<section class="container bg-success" style=" margin-top: 10px;padding: 30px;padding-bottom: 120px;">
	<header>
			<h3><center>WELCOME TO COMPUTER SCIENCE </h3></center>
                  <center>      <p>DEPARTMENT FEES PAYMENT PORTAL</p></center>
		</header>
	<div class=" row ">
		
		<div class="col-md-4"></div>
		<div class="col-md-4 card" style="background:; height: 250px; padding: 20px;">
			<center><h3><b>Sign In Form</b></h3></center>
			<form method="post" action="">
				<div class="form-group">
				<input type="text" class="form-control" name="regno" placeholder="Enter your registration number" required></div><br>
				<div class="form-group">
				<input type="password" class="form-control" name="pword" placeholder="Enter your password" required>
			</div><br>

				<center><button type="submit" name="login" class="btn btn-primary">Login</button></center>

				
			</form>
		</div>
		<div class="col-md-4 ">
			
		</div>
	</div>
	<center><p>Any issues?<a href="#" class="text-danger"> Send us an email</a> or call our support on +234</p></center>
</section>
	
      	 <div class="container" style="margin-top: 10px;background-color: #333;color: #fff">
  
  <center>&copy; 2022 by<a class="" href="#"> Charles </a></center>

   
            
  
</div>


</body>
</html>