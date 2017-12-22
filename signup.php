<?php
//CREATING THE REQUIRED CONNECTION
require "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
        <link rel="stylesheet" type="text/css" href="styling.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <center>
    <div>
    <h1>Sign Up</h1>
    <form action="signup.php" method="post">
       Firstname<br>
       <input type="text" name="firstname" required autofocus>
       <br>
       Lastname<br>
       <input type="text" name="lastname">
       <br>
       Email<br>
       <input type="email" name="email" required>
       <br>
       Password<br>
       <input type="password" name="pass"required>
       <br>
       Confirm Password<br>
       <input type="password" name="cpass">
       <br><br>
       <input type="submit" name="signup" value="sign up">
       <br>
       <p>Already user? <i><a href="signin.php">Sign in</a><i></p>
    </form>
    </div>
</center>
    <?php
     
     if(isset($_POST['signup']))
      {       
	$username=$_POST['email'];
	$password=$_POST['pass'];
	$cpassword=$_POST['cpass'];
	//CHECKING CONFIRM PASSWORD AND PASSWORD			
	if($password==$cpassword)
	{
	$query = mysqli_query($conn, "SELECT * FROM user WHERE email='$username'");
        $rows = mysqli_num_rows($query);
        if($rows >0){
         echo '<script type="text/javascript"> alert("Username exists... use new")</script>';
            
        }
        else
        { 
          // PASSWORD HASHING
          $npassword=password_hash($password,PASSWORD_DEFAULT);
          $sql="INSERT INTO user (firstname, lastname, email, password) VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[email]', '$npassword')";
           if(mysqli_query($conn, $sql)){
             echo "";
           }
           echo '<script type="text/javascript"> alert("Now sign-in")</script>';
          
        }
        }
        else
        {
          echo '<script type="text/javascript"> alert("password Not matching... sign up again")</script>';
         }
       }
       else
       {
        }

mysqli_close($conn);
?>
</body>
</html>
