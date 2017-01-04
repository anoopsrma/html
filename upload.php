<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Allow only .rtf files

if($fileType != "rtf") 
{
    echo "Sorry only Rtf file is allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $html = " <a href= 'test.php' > Parse file </a>";
        echo "<pre>";
        echo($html);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

}
?>