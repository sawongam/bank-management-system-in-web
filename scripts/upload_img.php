<?php
session_start();

$target_dir = "../pages/dashboard/img/";
$extensions = ['jpg', 'jpeg', 'png', 'gif']; // Add or remove file extensions as needed

// Delete old image file
foreach ($extensions as $extension) {
    $old_file = $target_dir . "pp_" . $_SESSION['AccNo'] . "." . $extension;
    if (file_exists($old_file)) {
        unlink($old_file);
    }
}

// Upload new image file
$get_extension = explode(".", $_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . "pp_" . $_SESSION['AccNo'] . "." . end($get_extension);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Photo successfully uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
