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
            <a href="dashboardadmin.php">Back to Dashboard</a>&nbsp; &nbsp;
        </div>
      </div>
</div>
<hr>
<!-- end of header -->

<!-- start of body -->
<div>
    <center>    <h1>Unseen complaints</h1></center>

<table id="" class="complaint-table">
  <tr>
    <th>Serial</th>
    <th>Category</th>
    <th>Complaint</th>
    <th>Date Submited</th>
    <th>Admin Date</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <tr>
    <td>1</td>
    <td>category</td>
    <td>Complaint body here</td>
    <td>1/12/2022</td>
    <td>1/12/2022</td>
    <td>Status</td>
    <td><button class="view-btn"> <a href="adminviewcomplaint.php">Open</a> </button> </td>
  </tr>
  <tr>
     <td>2</td>
    <td>category</td>
    <td>Complaint body here</td>
    <td>1/12/2022</td>
    <td>1/12/2022</td>
    <td>Status</td>
    <td><button class="view-btn"> <a href="adminviewcomplaint.php">Open</a> </button> </td>
  </tr>
  
 
</table>
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