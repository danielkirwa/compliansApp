<?php 
  require_once('connection.php');
 ?>
 <?php 

        if(isset($_POST['createaccount'])){
           $PASSWORD = $_POST['password'];
             $CONFIRMPASSWORD = $_POST['confirmpassword'];
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
          <center><img src="assets/logo.png" width="150px">
          <br>
          <input type="" name="" class="myinput" placeholder="Username/email"><br>
          <input type="password" name="" class="myinput" placeholder="password"><br><br>
          <input type="checkbox" name=""> Show password<br><br>
          <input type="submit" name="" class="loginbutton" value="Log in now"><br></center><br><br>
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
          <input type="password" name="password" class="myinput" placeholder="Enter password"><br>
          <input type="password" name="confirmpassword" class="myinput" placeholder="Confirm password"><br><br>
          <input type="checkbox" name=""> Show password<br><br>
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
</body>
</html>