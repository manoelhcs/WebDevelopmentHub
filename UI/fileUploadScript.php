<?php

echo "here";

$currentDirectory = getcwd();
$uploadDirectory = "/uploads/";

$errors = []; // Store errors here

echo "here";

$fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed

$fileName = $_FILES['the_file']['name'];
$fileSize = $_FILES['the_file']['size'];
$fileTmpName  = $_FILES['the_file']['tmp_name'];
$fileType = $_FILES['the_file']['type'];

$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);

if (isset($_POST['submit'])) {

    if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
    }

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            echo "The file " . basename($fileName) . " has been uploaded";
        } else {
            echo "An error occurred. Please contact the administrator.";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
    }

}
?>