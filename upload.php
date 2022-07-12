<?php
    if(isset($_POST['Submit'])){
        $filePath = $_FILES['Profilepicture']['tmp_name'];
        $fileName = $_FILES['Profilepicture']['name'];
        $fileSize = $_FILES['Profilepicture']['size'];
        $fileType = $_FILES['Profilepicture']['type'];
        $filenamecmps =  explode(".", $fileName);
        $filenamecmps = end($filenamecmps);
        $allowfiles = array("gif", "png", "jpg");

        if(in_array($filenamecmps,  $allowfiles) == true)
        {
            echo "uploaded"."<br>";
            $pic = time().$fileName;
            $date = new DateTime();
            $pictime = $date->getTimezone();
            move_uploaded_file($filePath, "PHP_Image/".time().$fileName);

        }
    }



