<?php 
// Include the database configuration file  
require_once 'config.php'; 
session_start();
 
// Check if the user is logged in, if not then redirect him to login page

// Check if the form is submitted
if (isset($_POST['submit'])) {
    
    
    $targetDir = 'uploads/'; // Directory to store the uploaded images
    $uploadedFiles = $_FILES['images']; // Assuming the file input field is named 'images'

  
    // Check the connection
    if ($conn->connect_error) {
     die('Connection failed: ' . $conn->connect_error);
   }

    // Create the posts table if it doesn't exist
    //$createTableQuery = "CREATE TABLE IF NOT EXISTS users (
        
    //    image2 VARCHAR(255) NOT NULL
    //)";
    $conn->query($createTableQuery);

    // Get the session ID
    $sessionID = session_id();

    // Insert image information into the database
    foreach($uploadedFiles['tmp_name'] as $key => $tmpName) {
        $fileName = $uploadedFiles['name'][$key];
        $targetPath = $targetDir . $fileName;

        if (move_uploaded_file($tmpName, $targetPath)) {
            // Image uploaded successfully, save the session ID and image path in the database
            $insertQuery = "INSERT INTO users ( image2) VALUES ( '$targetPath') ";
            $conn->query($insertQuery);
        }
    }

    // Close the database connection
    $conn->close();
}
?>