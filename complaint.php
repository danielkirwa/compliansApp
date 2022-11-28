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

  // select categories
        $allcategories = "SELECT ID, CATEGORY FROM tblcategory WHERE STATUS = 1";
$categoryresult = mysqli_query($conn, $allcategories);

?>
<?php 

if(isset($_POST['submitcomplaint'])){
            if($_POST['complainttext'] != "" ){

            $CATEGORY = $_POST['Categoryslected'];
            $COMPLAINTTEXT = $_POST['complainttext'];
            //$COMPLAINTEVIDENCE = $_POST['categorydetails'];
           
            
             
    $sql = "INSERT INTO tblcomplains (CATEGORYID,ID, COMPLAIN, STATUS)
    VALUES ('{$CATEGORY}','{$currentUser}', '{$COMPLAINTTEXT}', 1)";

    if ($conn->query($sql) === TRUE) {
         echo "<script>alert('Success, Submitted your complaint');</script>";

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

            
                }else{
           echo "<script>alert('Complaint must be filled');</script>";
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
            <a href="#" class="active">Complaint</a>&nbsp; &nbsp;
            <a href="dashboard.php">Dashboard</a>&nbsp; &nbsp;
           <a href="profile.php"><?php echo $currentUser; ?></a> &nbsp; &nbsp;
           <a href="logout.php">Logout</a>&nbsp; &nbsp;
     	</div>
      </div>
</div>
<hr>
<!-- end of header -->

<!-- start of body -->

<div class="complaint-form-holder">
    <div class="complaint-guide">
        <p>Kindly fill in the details of the complaint accodingly you can also uplaod related documents in the following format(.png, .jpg, .jpeg, .pdf, .doxc, .txt).</p>
    </div>
    <div class="complaint-form">
        <form action="complaint.php" method="POST">
        <br><center>
        
        <select class="myselect" name="Categoryslected">    
        <?php if(mysqli_num_rows($categoryresult) < 0) {
    } else {
    while ($row = mysqli_fetch_assoc($categoryresult)){ ?>
    
      <option value="<?php echo $row['CATEGORY']?>"<?php if (!(strcmp($row['ID'], $row['ID']))) {echo "selected=\"selected\"";} ?>><?php echo $row['CATEGORY']?></option>
  
      }
     ?>
   
      
      
    
    <?php } ;
    
  } ?>
</select>
    
        <br><br>
        <textarea placeholder="Type your complaint here" class="mytextarea" rows="10" name="complainttext"></textarea><br><br>
        <input type="file" name="complaintevidence" class="myselect"><br><br>
        <input type="submit" name="submitcomplaint" value="Submit complant" class="mybutton">
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


