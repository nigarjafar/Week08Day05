<?php

$name= $_POST["name"];
$place= $_POST["place"];
$target_file = "uploads/" . date('dmYGis') . basename($_FILES["img"]["name"]);
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

if ($imageFileType == 'jpg' || $imageFileType == 'png'|| $imageFileType == 'gif') {
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
} 

$uploaded= fopen("uploaded.txt", "a+") or die("Unable to open");
    fwrite($uploaded, $name."|".$place."|".$target_file."###");
fclose($uploaded);

header("Location:upload.php");

?>
