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
<?php 

<?php 
 $admins = "Admin"
 // select categories 
$alladmins = "SELECT * FROM tblusers WHERE PRIVILLAGE = '{$admins}'   ORDER BY COUNTER DESC";
$result = $conn->query($alladmins);


 ?>
 ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/dash.css">
    <title>All users</title>
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
<!-- admins table -->
<div>
    <center>    <h1>Admins</h1></center>

<table id="" class="complaint-table">
  <tr>
    <th>Serial</th>
    <th>First name</th>
    <th>Email address</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Name</td>
    <td>address@gmail.com</td>
    <td>Active</td>
    <td><button class="view-btn"> <a href="#">Close</a> </button> </td>
  </tr>
  <tr>
     <td>1</td>
    <td>Name</td>
    <td>address@gmail.com</td>
    <td>Active</td>
    <td><button class="view-btn"> <a href="#">Close</a> </button> </td>
  </tr>
  
 
</table>
    </div>
   

<br><br>

<!-- other users table -->
    <center>    <h1>Other users</h1></center>

<table id="" class="complaint-table">
  <tr>
    <th>Serial</th>
    <th>Date Joined</th>
    <th>First name</th>
    <th>Email address</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <tr>
    <td>1</td>
    <td>12/3/2022</td>
    <td>Name</td>
    <td>address@gmail.com</td>/
    <td>Active</td>
    <td><button class="view-btn"> <a href="#">Close</a> </button> </td>
  </tr>
  <tr>
     <td>1</td>
     <td>12/3/2022</td>
    <td>Name</td>
    <td>address@gmail.com</td>
    <td>Active</td>
    <td><button class="view-btn"> <a href="#">Close</a> </button> </td>
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