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
<!-- insert new category -->
<?php 

 if(isset($_POST['submitcategory'])){
            if($_POST['newcategory'] != "" ){

            $CATEGORY = $_POST['newcategory'];
            $CATEGORYDETAILS = $_POST['categorydetails'];
           
            
             
    $sql = "INSERT INTO tblcategory (CATEGORY, DESCRIPTION, STATUS)
    VALUES ('{$CATEGORY}', '{$CATEGORYDETAILS}', 1)";

    if ($conn->query($sql) === TRUE) {
         echo "<script>alert('Success, New category added');</script>";

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

            
                }else{
           echo "<script>alert('Category must be filled');</script>";
        }
 
           

        }
   
     // select categories
        $allcategories = "SELECT ID, CATEGORY, DESCRIPTION,DATEADDED, STATUS FROM tblcategory";
$categoryresult = mysqli_query($conn, $allcategories);



 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/index.css">
    <link rel="stylesheet" type="text/css" href="styles/complaint.css">
    <link rel="stylesheet" type="text/css" href="styles/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <form action="addcategory.php" method="POST">
            <label>New Complaint Category :</label><br>
         <input type="text" name="newcategory" placeholder="Enter category name" class="myinputview">
        <br><br>
        <label>Category Description  :</label><br>
        <textarea placeholder="Category Description here" class="mytextarea" rows="10" name="categorydetails"></textarea><br><br>
        
        <br><br>
        <input type="submit" name="submitcategory" value="Add New Complaint" class="mybutton">
        </center>
        <br>
        </form>
    </div>

</div>

<div>
    <center>    <h1>Unseen complaints</h1></center>

<table id="" class="complaint-table">
  <tr>
    <th>Serial</th>
    <th>Category</th>
    <th>Description</th>
    <th>Date Add</th>
    <th>Status</th>
    <th>Action</th>
  </tr>



 </tr>
  <?php if(mysqli_num_rows($categoryresult) < 0) {
    } else {
    while ($row = mysqli_fetch_assoc($categoryresult)){ ?>
    <tr>
      <td><?php echo $row["ID"];  ?></td>
      <td><?php echo $row["CATEGORY"];?></td>
      <td><?php echo $row["DESCRIPTION"]; ?></td>
      <td><?php echo $row["DATEADDED"]; ?></td>
      <td><?php   
          if($row["STATUS"] == 1){
        echo "Active";
      }else{
        echo "Closed";
      }
     ?></td>

     <td>

         <?php   
          if($row["STATUS"] == 1){
        echo "<button class=\"sub-btn-open\"> <a href=\"#\"><i class=\"fa fa-plus\"></i> &nbsp;Open</a> </button> ";
      }else{
        echo "<button class=\"sub-btn-close\"> <a href=\"#\"><i class=\"fa fa-close\"></i> &nbsp;Close</a> </button> ";
      }
     ?>
    </td>
      
      
    </tr>
    <?php } ;
    
  } ?>



</table>
    </div>
   

<br><br><br>


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