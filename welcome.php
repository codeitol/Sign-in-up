<?php
   session_start();
   require "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body>
<center>
<h1><b>Home Page</b></h1> 
<?php 
$sql="SELECT * FROM user";
//TO SHOW NAME OF USER WHEN HOME PAGE LOADS
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
  while($row=mysqli_fetch_assoc($result))
  {
    if(($row["email"]==$_SESSION["email"]))
    {
    
    echo "<b>WELCOME ".$row[firstname]." ".$row[lastname]."</b>";
    }
  }
}
?>
<div>
<form action="welcome.php" method="post">
 <h2>Please fill out the profile form</h2>
 <h3>Username: <?php echo $_SESSION['email']; ?></h3>
 Birthday:<br>
 <input type="date" name="bday" required/>
 <br><br>
 Gender:<br>
 Male<input type="radio" name="gender" value="male"/>
 Female<input type="radio" name="gender" value="female"/>
 Other<input type="radio" name="gender" value="Other"/>
 <br><br>
 Mobile No.:<br>
 <input type="int" name="mob"required/>
 <br><br>
 Address:<br>
 <textarea name="address">
  
 </textarea>
 <br><br>
  <input name="save" type="submit" value="save">
 <br><br>
 <a href="signin.php">Log Out</a>
 <br><br>

</form>
</div>
</center>
<?php 
if(isset($_POST["save"]))
{
$birthday=$_POST["bday"];
$gender=$_POST["gender"];
$mob=$_POST["mob"];
$addd=$_POST["address"];
$em=$_SESSION["email"];
          //INSERTING VALUE IN PROFILE TABLE
         $sql="INSERT INTO profile (birthday, gender, mob, address, email) VALUES ('$birthday','$gender','$mob','$addd', '$em')";  
         if(mysqli_query($conn,$sql)){
           echo " ";
           }
         else
         {
          echo " ". mysqli_error($conn);
         }
                         
}
mysqli_close($conn);
?>
<div class="footer">
  <p>Created by @mahimakdn and @ayushimaheshwari98</p>
</div>

</body>
</html>


