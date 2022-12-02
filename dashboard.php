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
$sql = "SELECT * FROM tblcomplains WHERE ID = '{$currentUser}'   ORDER BY COUNTER DESC";
$result = $conn->query($sql);


 ?>

<?php 

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
            <a href="#" class="active">Dashboard</a>&nbsp; &nbsp;
            <a href="complaint.php">Complaint</a>&nbsp; &nbsp;
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
        <div class="lb-div" style="background: tomato;">Pending</div><br>
        <div class="lb-div" style="background:  mediumseagreen;">Closed</div>
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
    <center>    <h1>Your submission</h1></center>

<table id="" class="complaint-table">
  <tr>
    <th>Serial</th>
    <th>Category</th>
    <th>Complaint</th>
    <th>Date</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <tr>
<?php 
  if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {?>

    <tr>
      <td><?php echo $row["COUNTER"];  ?></td>
      <td><?php echo $row["CATEGORYID"];?></td>
      <td><?php echo $row["COMPLAIN"]; ?></td>
      <td><?php echo $row["DATEADDED"]; ?></td>
      <td><?php if($row["STATUS"] == 1){
       echo "<label style= \"background : tomato;   padding: 8px 8px;\"> UNSEEN </label>";
      }else if($row["STATUS"] == 2){
         echo "<label style=\"background : orange; padding: 8px 8px;\"> PENDING </label>";
      }else{
         echo "<label style=\"background : mediumseagreen; padding: 8px 8px;\"> CLOSED </label>";
      } ?></td>

     <td>
 <button class="view-btn" value="<?php echo $row["COUNTER"]; ?>" name=""><a href="viewcomplaint.php? editcomplaintid=<?php echo $row["COUNTER"];
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