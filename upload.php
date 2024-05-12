<?php 
// Include the database configuration file  
require_once 'config.php'; 
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php

$status = $statusMsg = ''; 
/*if(isset($_GET["submit"]))
{*/
 
$k =htmlspecialchars($_SESSION["id"]);
$Favourite_song= $_REQUEST["Song"];
$Favourite_movie =$_REQUEST["Movie"];
$About_me =$_REQUEST["About"];
/*$Image =$_REQUEST["image"];
$I= base64_decode($Image);*/
$fileName = basename($_FILES["image"]["name"]); 
$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
 
// Allow certain file formats 
$allowTypes = array('jpg','png','jpeg','gif'); 
if(in_array($fileType, $allowTypes)){ 
    $image = $_FILES['image']['tmp_name']; 
    $imgContent = addslashes(file_get_contents($image)); 

    $insert = $link->query("UPDATE `users` SET `About me` = '$About_me', `Favourite song` = '$Favourite_song', `Favourite movie` = '$Favourite_movie', `image`='$imgContent ' WHERE `users`.`id` =$k ;");
/*    
    if($insert){ 
        echo "success updated";
    }else{ 
        echo "failed to update ";
    }
    */
}
$insert = $link->query("UPDATE `users` SET `About me` = '$About_me', `Favourite song` = '$Favourite_song', `Favourite movie` = '$Favourite_movie' WHERE `users`.`id` =$k ;");
    
if($insert){ 
    echo "success updated";
}else{ 
    echo "failed to update ";











    
}
/*}*/

?>

<?php

// If file upload form is submitted
/* 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    $first_name =  $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $k =htmlspecialchars($_SESSION["id"]);
    $in = $link->query("UPDATE `users` SET `Favourite song` =$first_name  WHERE `users`.`id` = $k;");
    if($in){ 
        $status = 'success'; 
        $statusMsg = "success."; 
    }else{ 
        $statusMsg = "failed."; 
    } 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
            $z= base64_encode($image); 
            $y =htmlspecialchars($_SESSION["id"]);
            // Insert image content into database 
            $insert = $link->query("UPDATE `users` SET `Favourite song` =$first_name  WHERE `users`.`id` = $y;"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg;
*/ 
?>