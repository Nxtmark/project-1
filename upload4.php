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
    $targetDir = 'uploads/'; // Directory to store the uploaded images
    $uploadedFiles = $_FILES['images']; 
$k =htmlspecialchars($_SESSION["id"]);

/*foreach ($uploadedFiles['tmp_name'] as $key => $tmpName) {
    $fileName = $uploadedFiles['name'][$key];
    $targetPath = $targetDir . $fileName;
/*$Image =$_REQUEST["image"];
$I= base64_decode($Image);*/
$fileName = basename($_FILES["images"]["name"]); 
$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
 
// Allow certain file formats 
$allowTypes = array('jpg','png','jpeg','gif'); 

if(in_array($fileType, $allowTypes)){ 
    
  
    $image = $_FILES['images']['tmp_name']; 
    
    $imgContent = addslashes(file_get_contents($image)); 
    /*$result = $mysqli->query("SELECT id FROM mytable WHERE city = 'c7'");*/
    /*$a=$link->query("SELECT 's' FROM `users` WHERE `id` =$k;");
    $b=$link->query("SELECT 't' FROM `users` WHERE `id` =$k;");
    $c=$link->query("SELECT 'u' FROM `users` WHERE `id` =$k;");
    $d=$link->query("SELECT 'v' FROM `users` WHERE `id` =$k;");
    $e=$link->query("SELECT 'w' FROM `users` WHERE `id` =$k;");
    */
    $file1= 'default-pp.png';
    $insert = $link->query("UPDATE  `users` SET  `image4`='$imgContent ' WHERE `id` =$k ;");

    /*$m='0';

    if($a=='0'){
        $insert = $link->query("UPDATE  `users` SET  `image2`='$imgContent ' WHERE `id` =$k ;");
        $insert = $link->query("UPDATE  `users` SET  's'='1' WHERE `id` =$k ;");
    }elseif($b=='0'){
        $insert = $link->query("UPDATE  `users` SET  `image3`='$imgContent ' WHERE `id` =$k ;");
        $insert = $link->query("UPDATE  `users` SET  't'='1' WHERE `id` =$k ;");

    }
       elseif($c=='0'){
        $insert = $link->query("UPDATE  `users` SET  `image4`='$imgContent ' WHERE `id` =$k ;");
        $insert = $link->query("UPDATE  `users` SET  'u'='1' WHERE `id` =$k ;");

    }
       elseif($d=='0'){
        $insert = $link->query("UPDATE  `users` SET  `image5`='$imgContent ' WHERE `id` =$k ;");
        $insert = $link->query("UPDATE  `users` SET  'v'='1' WHERE `id` =$k ;");

    }
       /* else{
            $insert = $link->query("UPDATE  `users` SET  `image6`='$imgContent ' WHERE `id` =$k ;");
    
        }*/
}

/*
$uploads_dir = 'photo/';

$imageArr = array();

foreach ($_FILES["image2"]["error"] as $key => $error) {

if ($error == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["image2"]["tmp_name"][$key];
    $name = $_FILES["image2"]["name"][$key];
    move_uploaded_file($tmp_name, "$uploads_dir/$name");
    array_push($imageArr,$name);
}

}

$imageArr=serialize($imageArr);

$insert = $link->query("INSERT INTO `users` SET  `image2`='$imgContent ' WHERE `users`.`id` =$k ;" );
*/
    
if($insert){ 
    echo "success updated";
}else{ 
    echo "failed to update ";
}
/*}*/

?>