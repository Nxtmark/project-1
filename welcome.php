<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 <?php 
// Include the database configuration file  
require_once 'config.php'; 
$k =htmlspecialchars($_SESSION["id"]); 
// Get image data from database 
$result = $link->query("SELECT * FROM users WHERE id= $k "); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div id="gallery">
        <div style="color:red ;font: 20px sans-serif; text-align: center"><?php  echo("Profile photo")?> </div>
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
        <?php  $c= ($row['About me']);?>
        <?php  $d= ($row['Favourite song']);?>
        <?php  $e= ($row['Favourite movie']);?>
        <div class="card2">
       <!--<form action="upload2.php" method="post" enctype="multipart/form-data">
                <label>Post</label>
                 <input type="file" name="images" multiple required>
                 
                 <input type="submit" value="Submit">
        </form>
        <form action="upload3.php" method="post" enctype="multipart/form-data">
                <label>Post 2</label>
                 <input type="file" name="images" multiple required>
                 
                 <input type="submit" value="Submit">
        </form>
        <form action="upload4.php" method="post" enctype="multipart/form-data">
                <label>Post 3</label>
                 <input type="file" name="images" multiple required>
                 
                 <input type="submit" value="Submit">
        </form>
        
        <form action="upload5.php" method="post" enctype="multipart/form-data">
                <label>Post 4</label>
                 <input type="file" name="images" multiple required>
                 
                 <input type="submit" value="Submit">
        </form> 

        <form action="upload6.php" method="post" enctype="multipart/form-data">
                <label>Post 5</label>
                 <input type="file" name="images" multiple required>
                 
                 <input type="submit" value="Submit">
        </form> 
        -->
        </div>
        <div class="image-feed">
         <div class="image">
            
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image2']); ?>" alt="Image 2">
        </div>
            <div class="image">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image3']); ?>" alt="Image 3">
            
        </div>
        <div class="image">

         <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image4']); ?>" alt="Image 4">
         </div>
         <div class="image">

            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image5']); ?>" alt="Image 5">
          </div>
        <div class="image">

            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image6']); ?>" alt="Image 6">

           


           
        </div>   
            <?php } ?> 
    </div>
    
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
   <style>
        body{ font: 14px sans-serif; text-align: center; }
        {
            font: 14px sans-serif; text-align: center; color: red; 
        }
        #gallery{
            height: 400px;
            width: 400px;
            border: 2px solid blue
        }#gallery img {
           max-width: 100%;
           max-height: 100%;
           margin: auto;
           display: block;
       }
        a1{
             
            height: 500px;
            width: 300px;
            
            font: 20px sans-serif; text-align: center; color: white 
        }
        
        .card {
           box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
           max-width: 400px;
           height: 450px;
           
           position: absolute;
           top: 0px;
           right: 0px;
           left: 750px;
           text-align: center;
       }
       .card2{
        position: relative;
        top: 0px;
        right: 0px;
        left: 750px;
       }
       .image-feed {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding-top:500px;
    padding-LEFT: 10px;
    position: absolute;
}

.image {
    position: relative;
    margin: 10px;
    
}

.image img {
    width: 200px;
    height: 200px;
    object-fit: cover;
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.image-overlay:hover {
    opacity: 1;
}

.image-title {
    color: #fff;
    font-size: 18px;
    font-weight: bold;
    text-align: center;
}

    </style>
</head>
<body>
    <div class="card">
    <h1 class="my-5">Welcome, <b><?php echo strtoupper(htmlspecialchars($_SESSION["username"])); ?></b>.</h1>
     
    
    <a1> <a2 style=" font: 20px sans-serif; text-align: center; color: violet">Name      =           </a2> <?php echo strtoupper( htmlspecialchars($_SESSION["username"]))?></a1>

     <br></br>
     
     <a1> <a2 style=" font: 20px sans-serif; text-align: center; color: violet">About ME =     </a2>   <?php echo strtoupper(($c)) ?></a1>
     <br></br> 
     <span></span>
     
     <a1> <a2 style=" font: 20px sans-serif; text-align: center; color: violet">Favourite Song =</a2> <?php echo strtoupper(($d)) ?></a1>
     <br></br>
   

     <a1> <a2 style=" font: 20px sans-serif; text-align: center; color: violet">Favourite Movie =</a2><?php echo strtoupper(($e)) ?></a1>
 
     <br></br>
     <p> 
        <a href="post2.php" class="btn btn-warning">Make a Post</a>
        <a href="Editinfo.php" class="btn btn-warning">Edit info</a>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a>
    </p>
    </div>
    <!--<div class="vbI XiG" role="list" style="height: 17846px; width: 1500px;padding:150px;background:blue">

</div>
<div class="image-feed">
        <div class="image">
            
            <img src="image1.jpg" alt="Image 1">
            <div class="image-overlay">
                <span class="image-title">Image 1</span>
            </div>
        </div>
        <div class="image">
            <img src="image2.jpg" alt="Image 2">
            <div class="image-overlay">
                <span class="image-title">Image 2</span>
            </div>
        </div>

    </div>
</body>
</html>
-->