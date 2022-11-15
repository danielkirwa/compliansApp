<?php 
   require_once('connection.php');

 ?>
 <?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

if ($_SESSION['username']) {
  // code...
 $currentUser =  $_SESSION['username'];

}else{
    header("Location:index.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/complaint.css">
	<title>Complaint</title>
</head>
<body>
 <!-- start of header -->
<div class="myheader">
	<div class="logoholder"><img src="assets/logo.png" width="150px"></div>
     <div class="headerdetails"> 
     	<div class="websitename">
          <center><h3>Kenya literature bureau</h3></center>
     	 </div>
     	<div class="navbar">
            <a href="profile.php"  class="active"><?php echo $currentUser; ?></a> &nbsp; &nbsp;
            <a href="dashboard.php">Dashboard</a>&nbsp; &nbsp;
            <a href="complaint.php">Complaint</a>&nbsp; &nbsp;
           <a href="logout.php">Logout</a>&nbsp; &nbsp;
     	</div>
      </div>
</div>
<hr>
<!-- end of header -->

<!-- start of body -->

<div class="complaint-form-holder">
    <div class="complaint-guide">
        <p><center>My Profile</center> </p>
    </div>
    <div class="complaint-form">
        <center><br>
             <label style="font-size :18px; font-weight: bold;">User email</label><br><br>
             <label style="font-size :18px; font-weight: bold;">Full name</label>
        </center><br>
       
    </div>
    <div class="complaint-form">
         <center>
        <div class="password-changer">
        <center>
             <label style="font-size: 18px;"><b>Change password</b></label>
        </center>
        <input type="password" name="" placeholder="Old password" class="mypasswordinput"><br>
        <input type="password" name="" placeholder="New password" class="mypasswordinput"><br>
        <input type="password" name="" placeholder="Confirm new passsword" class="mypasswordinput"><br><br>
        <input type="submit" name="" value="Change password" class="mybutton">
       </div>
      </center>
    </div>

</div>


<br><br><br><br>

<!-- end of body -->
<div class="footer">
    <center>
    KLB complains &copy; 2022
    </center>
</div>



</script>
</body>
</html>