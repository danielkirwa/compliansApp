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
 // select categories 
$sql = "SELECT * FROM tblcomplains WHERE STATUS = 1  ORDER BY COUNTER DESC";
$result = $conn->query($sql);


 ?>

 <?php 
 // get counts
  $rowcount;
  $rowpending;
  $rowclosed;
  $rowuseen;
 //all complaints
  $sqlallcomplaimt = "SELECT * from tblcomplains";

   if ($resultall = mysqli_query($conn, $sqlallcomplaimt)) {

   // Return the number of rows in result set
   $rowcount = mysqli_num_rows( $resultall );
   
}else{
   $rowcount = 0;
}
//unseen all complaints
  $sqluseencomplaint = "SELECT * from tblcomplains WHERE STATUS = 1";

   if ($resultuseen = mysqli_query($conn, $sqluseencomplaint)) {

   // Return the number of rows in result set
   $rowuseen = mysqli_num_rows( $resultuseen );
   
}else{
   $rowuseen = 0;
}

//unseen all pending
  $sqlpendingcomplaint = "SELECT * from tblcomplains WHERE STATUS = 2";

   if ($resultpending = mysqli_query($conn, $sqlpendingcomplaint)) {

   // Return the number of rows in result set
   $rowpending = mysqli_num_rows( $resultpending );
   
}else{
   $rowpending = 0;
}



//all closed
  $sqlclosedcomplaint = "SELECT * from tblcomplains WHERE STATUS = 0";

   if ($resultclosed = mysqli_query($conn, $sqlclosedcomplaint)) {

   // Return the number of rows in result set
   $rowclosed = mysqli_num_rows( $resultclosed );
   
}else{
   $rowclosed = 0;
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
        <b><label><?php echo $rowcount ?></label></b><br><br>
            <button style="background:dodgerblue;" class="mybutton"><a href="complainttable.php">View Pending</a> </button>
        </center>
     </div>
      <div class="infor-card">
        <div class="lb-div" style="background: orange;">Pending</div><br>
        <center>
            <b><label><?php echo $rowpending; ?></label></b><br><br>
            <button style="background:orange;" class="mybutton"><a href="complainttable.php">View Pending</a> </button>
        </center>
        
     </div>
      <div class="infor-card">
        <div class="lb-div" style="background: mediumseagreen;">Solved</div><br>
        <center>
        <b><label><?php echo $rowclosed; ?></label></b><br><br>
            <button style="background:mediumseagreen;" class="mybutton"><a href="complainttable.php" >View Pending</a> </button>
        </center>
     </div>
     <div class="infor-card"> 
        <center>
         <div class="rate-holder">
            <br>
              <?php 

                 echo $rowclosed/($rowpending  + $rowclosed);
                 echo "%";
               ?>
         </div>
         </center>
         <center><label style="color: mediumseagreen; font-weight:bold; font-size: 18px;">Our solve rate</label> </center>
     </div>
</div>

<!-- your complaints -->

<div>
    <center>    <h1> <?php echo $rowuseen; ?> &nbsp;Unseen complaints</h1></center>

<table id="" class="complaint-table">
  <tr>
    <th>Serial</th>
    <th>Category</th>
    <th>Date</th>
    <th>Complaint</th>
    <th>Action</th>
  </tr>
  <?php 
  if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {?>

    <tr>
      <td><?php echo $row["COUNTER"];  ?></td>
      <td><?php echo $row["CATEGORYID"];?></td>
      <td><?php echo $row["DATEADDED"]; ?></td>
      <td><?php echo $row["COMPLAIN"]; ?></td>
      

     <td>
 <button class="view-btn" value="<?php echo $row["COUNTER"]; ?>" name=""><a href="adminviewcomplaint.php? editcomplaintid=<?php echo $row["COUNTER"];
                     ?>">Open</a> </button>
      
    </td>
    
    </tr>
    <?php
}
} else {
  echo "NO COMPLAINTS AVAILABLE";
}
  ?>
  
 
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
