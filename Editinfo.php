<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body{ font: 14px sans-serif; text-align: center; }
        .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 1000px;
  margin: auto;
  text-align: center;
  font-family: Serif;
  
  padding-left: 20px;
  padding-top:200px;
  padding-top:100px;
  color:black;
  font-size: 100px;
  font-size: large;
  background: #99994d;
}
h{
    text-align: center;
  font-family: verdana;
  color:#ffffff;
  font
   
}
    </style>
</head>
<body>
<h2 style="text-align:center">Edit Info</h2>
<div class = "card">
 <!--   
<form action="upload.php" method="get">
Name: <input type="text" name="name"><br>

<input type="submit">
</form>
-->
<form action="upload.php" method="post" enctype="multipart/form-data">
<h style="color=black">Favourite song: <input type="text" name="Song"><br></h>
<br></br>
<h>Favourite movie: <input type="text" name="Movie"><br></h>
<br></br>
<h>ABOUT YOU: <input type="text" name="About"><br></h>

  <br></br>
   
<label>Select profile photo:</label>
    <input type="file" name="image">
<!--    <input type="submit" name="submit" value="Upload">
    
    <p>
               <label for="firstName">First Name:</label>
               <input type="text" name="first_name" >
            </p>
 
             
<p>
               <label for="lastName">Last Name:</label>
               <input type="text" name="last_name" >
            </p>
 -->
            <input type="submit" value="Submit">
</div>           
</form>
  
    <p>
       
    </p>
</body>
</html>