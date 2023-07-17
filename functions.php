<?php

function userInput($postInput,$typeValidation=''){
    $message_required = "This field is required";
    $enteredValue = '';
    // 1 default -- 2 string -- > number
    if($typeValidation == ''){
        if (empty($postInput)) {
            $valueErr = $message_required;
        } else {
            $enteredValue = checkInput($postInput);
            $valueErr = '';
        }

    }elseif($typeValidation == 'text'){
        if (empty($postInput)) {
            $valueErr = $message_required;
        } elseif (is_numeric($postInput)) {
            $valueErr = "يجب ان يكون الحقل نص";
        } else {
            $enteredValue = checkInput($postInput);
            $valueErr = '';
        }
    }else{
        if (empty($postInput)) {
            $valueErr = $message_required;
        } elseif (!is_numeric($postInput)) {
            $valueErr = "يجب ان يكون الحقل رقم";
        } else {
            $enteredValue = checkInput($postInput);
            $valueErr = '';
        }
    }


    $data[] = $enteredValue;
    $data[] = $valueErr;

    return $data;
}

function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkUrl($path1 = '', $path2 = '', $path3 = '')
{

    $full_path = $_SERVER['REQUEST_URI'];
    $arr_path = explode('/', $full_path);

    $url = isset($arr_path[2]) ? $arr_path[2] : '';


    if($url != ''){
        $explode_path = explode('.', $url);
    }else{
        $explode_path[0] = '';
    }

    if ($explode_path[0] == $path1 || $explode_path[0] == $path2 || $explode_path[0] == $path3) {
        return 'active';
    } else {
        return '';
    }
}

function isInternalLink($url) {
    // Check if the URL starts with "http://" or "https://"
    if (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) {
        // External link
        return false;
    }else{
        return true;
    }
}

function uploadImage($files)
{
    if($files['name'] != ''){
        $target_dir = "uploads/";
//    $target_file = $target_dir . basename($files["name"]);
        $shorten = substr(md5($files['name']), 5, 12);
        $dotpos = strrpos($files['name'], ".");
        if ($dotpos) $ext = strtolower(substr($files['name'], $dotpos)); else $ext = "";
        $newname = $shorten . $ext;


        $target_file = $target_dir . $newname;

//    $target_file = $target_dir . basename($files["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($files["tmp_name"]);
        if ($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
//        echo "File is not an image.";
            $uploadOk = 0;
        }




        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
//        return "Sorry, your file was not uploaded.";
            return "";
            // if everything is ok, try to upload file
        } else {

            if (move_uploaded_file($files["tmp_name"], $target_file)) {
                return htmlspecialchars($newname);
//            return "The file " . htmlspecialchars(basename($files["name"])) . " has been uploaded.";
            } else {
//            return "Sorry, there was an error uploading your file.";
                return "";
            }
        }
    }

}