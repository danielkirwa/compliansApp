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
$complaintid = $_GET['editcomplaintid'];

// select specific complaint

$sql = "SELECT * FROM tblcomplains WHERE COUNTER = '{$complaintid}'  ";
$result = $conn->query($sql);



  $row = $result->fetch_assoc();




 ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/complaint.css">
    <link rel="stylesheet" type="text/css" href="styles/viewcomplaint.css">
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

<div class="complaint-form-holder">
    <div class="complaint-guide">
        <p>Complaint management.</p>
    </div>
    <div class="complaint-form">
        <br><center>
            <label>Complaint category :</label><br>
         <input type="text" name="" value="<?php echo $row["CATEGORYID"];  ?>" class="myinputview">
        <br><br>
        <label>Complaint  :</label><br>
        <textarea placeholder="Type your complaint here" class="mytextarea" rows="10"><?php echo $row["COMPLAIN"];  ?></textarea><br><br>
        <label>Date submited :</label><br>
         <input type="text" name="" value="<?php echo $row["DATEADDED"];  ?>" class="myinputview">
         <br><br>
          <label>Current status :</label><br>
             <input type="text" name="" value="<?php if ($row["STATUS"] == 1){
                echo "UNSEEN";

             }else if($row["STATUS"] == 2){
                echo "PENDING";
             }else{
                echo "CLOSED";
             }
               ?>" class="myinputview"><br><br>
        <label>Change status :</label><br>
         <select class="myinputview">
            <option>Change status</option>
             <option>Unseen</option>
             <option>Pendding</option>
             <option>Closed</option>
         </select>

         <br><br>
        <label>Respond to complaint  :</label><br>
        <textarea placeholder="Type your complaint here" class="mytextarea" rows="10"></textarea>
        <br><br>
        <input type="submit" name="" value="Update Complaint" class="mybutton">
        </center>
        <br>
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