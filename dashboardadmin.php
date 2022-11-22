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
	<title>Admin Dashboard</title>
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
            <a href="#" class="active">Dashboard</a>&nbsp; &nbsp;
            <a href="adminviewcomplaint.php">Complaint</a>&nbsp; &nbsp;
            <a href="addcategory.php">Category</a>&nbsp; &nbsp;
            <a href="allusers.php">Users</a>&nbsp; &nbsp;
           <a href="profile.php"><?php echo $currentUser; ?></a> &nbsp; &nbsp;
           <a href="logout.php">Logout</a>&nbsp; &nbsp;
     	</div>
      </div>
</div>
<hr>
<!-- end of header -->

<!-- start of body -->
    
<div class="dash-infor">
    <div class="infor-card">
        <div class="lb-div" style="background: dodgerblue;">All complains</div><br>
        <center>
        <label>number here</label><br><br>
            <button style="background:dodgerblue;" class="mybutton"><a href="complainttable.php">View Pending</a> </button>
        </center>
     </div>
      <div class="infor-card">
        <div class="lb-div" style="background: orange;">Pending</div><br>
        <center>
            <label>number here</label><br><br>
            <button style="background:orange;" class="mybutton"><a href="complainttable.php">View Pending</a> </button>
        </center>
        
     </div>
      <div class="infor-card">
        <div class="lb-div" style="background: mediumseagreen;">Solved</div><br>
        <center>
        <label>number here</label><br><br>
            <button style="background:mediumseagreen;" class="mybutton"><a href="complainttable.php" >View Pending</a> </button>
        </center>
     </div>
     <div class="infor-card"> 
        <center>
         <div class="rate-holder">
            <br>
             0.0%
         </div>
         </center>
         <center><label style="color: mediumseagreen; font-weight:bold; font-size: 18px;">Our solve rate</label> </center>
     </div>
</div>

<!-- your complaints -->

<div>
    <center>    <h1>Unseen complaints</h1></center>

<table id="" class="complaint-table">
  <tr>
    <th>Serial</th>
    <th>Category</th>
    <th>Date</th>
    <th>Complaint</th>
    <th>Action</th>
  </tr>
  <tr>
    <td>1</td>
    <td>category</td>
    <td>1/12/2022</td>
    <td>Complaint body here</td>
    <td><button class="view-btn"> <a href="adminviewcomplaint.php">Open</a> </button> </td>
  </tr>
  <tr>
     <td>2</td>
    <td>category</td>
    <td>1/22/2022</td>
    <td>Complaint body here</td>
    <td><button class="view-btn"> <a href="adminviewcomplaint.php">Open</a> </button> </td>
  </tr>
  
 
</table>
    </div>
   

<br><br><br>

<!-- end of body -->
<div class="footer">
    <center>
    KLB complains &copy; 2022
    </center>
</div>



</script>
</body>
</html>