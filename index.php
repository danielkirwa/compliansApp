<?php 
  require_once('connection.php');
 ?>
 <?php 

        if(isset($_POST['createaccount'])){
            if($_POST['firstname'] != "" && $_POST['email'] != "" && $_POST['password'] != ""){
           $PASSWORD = md5($_POST['password']);
             $CONFIRMPASSWORD = md5($_POST['confirmpassword']);
            $PRIVILLAGE = "User";
            if ($PASSWORD == $CONFIRMPASSWORD) {
                // code...
                 //echo("clicked");
            //code to insert data to the database/ register user
            $FNAME = $_POST['firstname'];
            $LNAME = $_POST['lastname'];
            $EMAIL = $_POST['email'];
            
             
    $sql = "INSERT INTO tbluserdetails (FIRSTNAME, LASTNAME, EMAIL, STATUS)
    VALUES ('{$FNAME}', '{$LNAME}', '$EMAIL',1)";

    if ($conn->query($sql) === TRUE) {
      echo "Account created successfully";

       $sqllogin = "INSERT INTO tblusers (USERNAME, PASSWORD, PRIVILLAGE)
    VALUES ('{$EMAIL}', '{$PASSWORD}', '$PRIVILLAGE')";

    if ($conn->query($sqllogin) === TRUE) {
      echo "Account created successfully";
    } else {
      echo "Error: " . $sqllogin . "<br>" . $conn->error;
    }

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

            }else{
                echo "Password do not match";
            }
                }else{
           echo "<script>alert('Fill in all details');</script>";
        }
 
           

        }

        

  ?>
  <?php 
     // login button 
         session_start();
        if(isset($_POST['logintoaccount'])){
             
            if($_POST['username'] != "" && $_POST['userpassword'] != ""){
            $newUserName = $_POST['username'];
            $NewPassword = md5($_POST['userpassword']);


            $query = "SELECT USERNAME,PRIVILLAGE FROM tblusers WHERE USERNAME='$newUserName' AND PASSWORD='$NewPassword'"; 
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
              // output data of each row
              if($row = $result->fetch_assoc()) {

                $_SESSION['username'] = $row["USERNAME"];
               $_SESSION['privillage'] = $row['PRIVILLAGE'];
                
   
                if($_SESSION['privillage'] == "User"){
                header("Refresh:1; url=dashboard.php");

               }

               if($_SESSION['privillage'] == "Admin"){
                //header("Location:dashboardadmin.php");

               }
               if($_SESSION['privillage'] == "none"){
                echo '<script>alert ("Your account was Disable")</script>';

               }
              }
            } else {
              echo "<script>alert('Incorrect login details');</script>";
            }


                }else{
           echo "<script>alert('Fill in all you login details');</script>";
        }
 
           

        }
   ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/index.css">
	<title></title>
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
           <a href="#">Register</a> &nbsp; &nbsp;
           <a href="#">Login</a>&nbsp; &nbsp;
     	</div>
      </div>
</div>

<hr>
<!-- end of header -->
<!-- start of body -->
<div class="form-holder">
    <div class="center-card" id="loginform">
        <form action="index.php" method="POST" name="formlogin" id="form2">
          <center><img src="assets/logo.png" width="150px">
          <br>
          <input type="" name="username" class="myinput" placeholder="Username/email"><br>
          <input type="password" name="userpassword" class="myinput" placeholder="password" id="password1"><br><br>
          <input type="checkbox" name="" id="btnshowpassword1" onclick="showpassword();"> Show password<br><br>
          <input type="submit" name="logintoaccount" class="loginbutton" value="Log in now"><br></center><br><br>
      </form>
          <button class="createaccountbutton" id="callregistration">Create new account</button><br><br>
          <button class="forgotpasswordbutton" id="callregistration">Forgot password</button><br><br>

    </div>

    <div class="center-card" id="registrationform">
        <form action="index.php" method="POST" name="formcreateaccount" id="form1">
        <center><img src="assets/logo.png" width="150px">
          <br>
          <input type="" name="firstname" class="myinput" placeholder="First name"><br>
          <input type="" name="lastname" class="myinput" placeholder="Other name"><br>
          <input type="" name="email" class="myinput" placeholder="Email"><br>
          <input type="password" name="password" class="myinput" placeholder="Enter password" id="password2"><br>
          <input type="password" name="confirmpassword" class="myinput" placeholder="Confirm password" id="password3"><br><br>
          <input type="checkbox" name="" onclick="showpassword2();" > Show password<br><br>
          <input type="submit" name="createaccount" class="loginbutton" value="Create account"><br></center><br><br>
      </form>
          <button class="createaccountbutton" id="calllogin">Log in instead</button><br><br>
    </div>
</div>
<!-- end of body -->
<div class="footer">
    <center>
    KLB complains &copy; 2022
    </center>
</div>


<script type="text/javascript" src="javascript/index.js">
</script>
<script type="text/javascript">
    function showpassword() {
  var x = document.getElementById("password1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
   function showpassword2() {
  var pass = document.getElementById("password2");
  var pass2 = document.getElementById("password3");
  if (pass.type === "password") {
    pass.type = "text";
    pass2.type = "text";
  } else {
    pass.type = "password";
    pass2.type = "password";
  }
}

</script>
</body>
</html>