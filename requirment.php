<?php
// RUN THIS FILE 1st BEFORE EVERY OTHER FILE TO CREATE DATABASE AND REQUIRED TABLES 
$servername = "localhost";
$username = "root";
$password = "12345";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE mydb";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
$dbname="mydb";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$asql="CREATE TABLE user (
          firstname VARCHAR(50),
          lastname VARCHAR(50),
          email VARCHAR(50) PRIMARY KEY, 
          password VARCHAR(70)
       )";
   if(mysqli_query($conn,$asql))
   {
    echo "created";
   }
   else
   {
    echo "error". mysqli_error($conn);
   }
$sql="CREATE TABLE profile (
          birthday VARCHAR(50),
          gender VARCHAR(50),
          mob INT(10),
          address VARCHAR(50),
          email VARCHAR(50),
          FOREIGN KEY(email) REFERENCES user(email)
       )";
   if(mysqli_query($conn,$sql))
   {
    echo "created";
   }
   else
   {
    echo "error". mysqli_error($conn);
   }
mysqli_close($conn);
?> 




