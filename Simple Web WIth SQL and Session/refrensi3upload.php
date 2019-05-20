
<?php
 if(!empty(basename($_FILES["imgu"]["name"]))){
    echo "true";
}
else{
    echo"false";
}
$currentDir = getcwd();
$target_dir = "/uimg/";
$target_file = $currentDir.$target_dir . basename($_FILES["imgu"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo$target_file;
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imgu"]["tmp_name"]);
    if($check !== false) {
        echo "<br>File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (move_uploaded_file($_FILES["imgu"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["imgu"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>