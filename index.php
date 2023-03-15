<?php

require_once("vendor/autoload.php");
require_once("views/upload.php");

$imgValidation = new ImageValidation();
$AwsS3 = new AWSBucketS3();
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $check = $imgValidation->validator();
    
    if(isset($check["name"]))   
    {
    $filename = $check["name"].$_FILES['fileToUpload']['name'];
    $result = $AwsS3->uploadImgtoAWS($filename);
    echo "</br><h3 style='color: green;'>".$check["status"]."</h3></br></br>";
    echo "<a href='./views/upload.php'>Submit Anoter Photo</a>";
    }else{
        echo '<h3 style="color: red;">'.$check["status"].'</h3>';
        echo "<a href='./views/upload.php'>Try Again</a>";
    }
}

?>