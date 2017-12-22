<?php
session_start();
require "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign in</title>
        <link rel="stylesheet" type="text/css" href="styling.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
   <center>
   <div>
   <h1>Login Now</h1>
   <br>
    <form action="signin.php" method="post">
       Username:<br>
       <input type="text" name="email" autofocus required/>
       <br>
       Password:<br>
       <input type="password" name="password" required/>
       <br>
       <br>
       <input type="submit" name="signin" value="Sign in">	
    </form>
    <p>New here? <i><a href="signup.php">Sign up</a></i>
    </div>
    </center>
    <?php
      if(isset($_POST['signin']))
      {       
	$username=$_POST['email'];
	$upassword=$_POST['password'];
        $sql="SELECT * FROM user";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result))
        {
          if(($row["email"]==$username))
          {
            $t=$row["password"];
            if(password_verify($upassword,$t)){
       // $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$username' AND password='$upassword'");
        //$rows = mysqli_num_rows($query);
        //if($rows >0){
            $_SESSION["email"]=$username;
            header("location: welcome.php");
        }}
        }
        }
        else
        {
           echo '<script type="text/javascript"> alert("Invalid credentials... you need to SIGN UP first")</script>';
          
        }
       }
       else
       {
        }
      mysqli_close($conn);
     ?>
</body>
</html>
