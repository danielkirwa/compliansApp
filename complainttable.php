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
$sql = "SELECT * FROM tblcomplains   ORDER BY COUNTER DESC";
$result = $conn->query($sql);


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
    <th>Status</th>
    <th>Action</th>
  </tr>
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
 <button class="view-btn" value="<?php echo $row["COUNTER"]; ?>" name=""><a href="adminviewcomplaint.php? editcomplaintid=<?php echo $row["COUNTER"]; 
 $rowselected = $row["COUNTER"];
   $_SESSION['selectedcomplaint'] = $rowselected;
 
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
   

<br><br><br><br>

<!-- end of body -->
<div class="footer">
    <center>
    KLB complains &copy; 2022
    </center>
</div>


<script type="text/javascript">
var selectedid = "<?php echo  $rowselected ?>";
localhost.setItem("idtoupdate",selectedid);
</script>
</body>
</html>