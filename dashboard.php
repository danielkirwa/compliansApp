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
    <link rel="stylesheet" type="text/css" href="styles/dash.css">
	<title>Dashboard</title>
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
           <a href="#"><?php echo $currentUser; ?></a> &nbsp; &nbsp;
           <a href="logout.php">Logout</a>&nbsp; &nbsp;
     	</div>
      </div>
</div>
<hr>
<!-- end of header -->
<!-- start of body -->
     <div class="center-card">
         <center><h3><label style="color: dodgerblue;">Kindly submit your complaints</label></h3>
         <br> </center>
         <center>
         <select class="myinput">
             <option>Option one</option>
             <option>Option two</option>
         </select></center><br>
         <textarea placeholder="Enter your complaint here" class="mytextarea" rows="10">
             
         </textarea><br>
         <br><center>
          <input type="submit" name="" value="Post Complaint" class="mybutton">
           </center>
         
     </div>
     <br>
<!-- end of body -->
<div class="footer">
    <center>
    KLB complains &copy; 2022
    </center>
</div>



</script>
</body>
</html>