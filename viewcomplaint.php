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
            <a href="dashboard.php">Back to Dashboard</a>&nbsp; &nbsp;
     	</div>
      </div>
</div>
<hr>
<!-- end of header -->

<!-- start of body -->

<div class="complaint-form-holder">
    <div class="complaint-guide">
        <p>Track complaint.</p>
    </div>
    <div class="complaint-form">
        <br><center>
            <label>Complaint category :</label><br>
         <input type="text" name="" value="complaint category" class="myinputview">
        <br><br>
        <label>Complaint  :</label><br>
        <textarea placeholder="Type your complaint here" class="mytextarea" rows="10"> Your complaint 
        </textarea><br><br>
        <label>Date submited :</label><br>
         <input type="text" name="" value="12/22/2022" class="myinputview">
         <br><br>
        <label>Status :</label><br>
         <input type="text" name="" value="Pending" class="myinputview">
         <br><br>
        <label>Date Viewed :</label><br>
         <input type="text" name="" value="12/22/2022" class="myinputview">
         <br><br>
        <label>Respond  :</label><br>
        <textarea placeholder="Type your complaint here" class="mytextarea" rows="10"> Complaint respond 
        </textarea>
        <br><br>
        <label>Date Closed :</label><br>
         <input type="text" name="" value="12/22/2022" class="myinputview">
        <br><br>
        <div class="rate-bar">
            <label>Rate us</label>
              <div class="star-holder">
            
                 <div class="one-star tooltip">
                     <img src="assets/star.png" width="30px">
                     <span class="tooltiptext">1 Star</span>
                 </div>
                  <div class="one-star tooltip">
                     <img src="assets/star.png" width="30px">
                     <span class="tooltiptext">2 Star</span>
                 </div>
                  <div class="one-star tooltip">
                     <img src="assets/star.png" width="30px">
                     <span class="tooltiptext">3 Star</span>
                 </div>
                  <div class="one-star tooltip">
                     <img src="assets/star.png" width="30px">
                     <span class="tooltiptext">4 Star</span>
                 </div>
                  <div class="one-star tooltip">
                     <img src="assets/star.png" width="30px">
                     <span class="tooltiptext">5 Star</span>
                 </div>
                 
              </div>
        </div>
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