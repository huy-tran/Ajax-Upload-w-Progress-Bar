<?php
    $images_arr = array();
    foreach($_FILES['filesToUpload']['name'] as $key=>$val){
        //upload and stored images
        $target_dir = "uploads/";
        $target_file = $target_dir.$_FILES['filesToUpload']['name'][$key];
        move_uploaded_file($_FILES['filesToUpload']['tmp_name'][$key],$target_file);
    }
?>