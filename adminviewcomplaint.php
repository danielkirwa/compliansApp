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



 $complaintid =  $_GET['editcomplaintid'];
 $x =  $_SESSION['selectedcomplaint'];
 echo $x;


// select specific complaint

$sql = "SELECT * FROM tblcomplains WHERE COUNTER = '{$complaintid}'  ";
$result = $conn->query($sql);



  $row = $result->fetch_assoc();




 ?>

 <?php 
 // get update time for status change
 $date = date('d-m-y h:i:s',strtotime('+2 hours'));


if(isset($_POST['submitrespond'])){
    $newstatusgiven = $_POST['newstatus'];
            if($newstatusgiven == "Useen" ){

           
  echo "<script>alert('Status not changed select new status');</script>";
            
                }else if($newstatusgiven == "Pending" ){
           
             
             $sqlupdatepending = "UPDATE tblcomplains SET STATUS = 2 , DATEVIEWED = '{$date}' WHERE COUNTER = '{$complaintid}' ";

           if ($conn->query($sqlupdatepending) === TRUE) {
           echo "Record updated successfully";
        echo "<script>alert('Successfully updated to Pending');</script>";
         //header("Location:complainttable.php");
        if ($_GET['editcomplaintid'] ==  "Undefined" ) {
            // code...
            header("Location:complainttable.php");
        }
           } else {
           echo "Error updating new status: " . $conn->error;
          // header("Location:complainttable.php");
           }           

           $conn->close();
            
             
   
        }else if($newstatusgiven == "Closed" ){
            $NEWRESPOND = $_POST['adminrespond'];

             if($NEWRESPOND != ""){
             $sqlupdatepending = "UPDATE tblcomplains SET STATUS= 0 , DATEVIEWED = '{$date}', DATECONCLUDED = '{$date}', CONCLUSION = '{$NEWRESPOND}' WHERE COUNTER = '{$complaintid}' ";

           if ($conn->query($sqlupdatepending) === TRUE) {
           echo "Record updated successfully";
        echo "<script>alert('Successfully updated to Closed');</script>";
        unset($_SESSION['complaintid']);
           } else {
           echo "Error updating new status: " . $conn->error;
           }           

           $conn->close();
       }else{
        echo "<script>alert('Fill in your respond to close the complaint');</script>";

       }

        }else{

         echo "<script>alert('Status not changed select new status');</script>";

        }
 
           

        }
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
            <form action="adminviewcomplaint.php" method="POST">
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
         <select class="myinputview" name="newstatus">
            <option>Change status</option>
             <option>Seen</option>
             <option>Pending</option>
             <option>Closed</option>
         </select>

         <br><br>
        <label>Respond to complaint  :</label><br>
        <textarea placeholder="Type your complaint here" class="mytextarea" rows="10" name="adminrespond"></textarea>
        <br><br>
        <input type="submit" name="submitrespond" value="Update Complaint" class="mybutton">
        </center>
        <br>
        </form>
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