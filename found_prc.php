<?php
include "includes/config.php";

    $name = $_POST['name'];
    $mobrno = $_POST['found-conctact'];

    $found_img = $_FILES['found-picture'];
    $img_name = $found_img['name'];
    $img_tmpName = $found_img['tmp_name'];
    $img_error = $found_img['error'];
    $img_size = $found_img['size'];

    $fileExt = explode('.', $img_name);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    if(in_array($fileActualExt, $allowed)){
        if($img_error == 0){
            if($img_size > 5100){
                $lost_id = "lId_".uniqid('', true).".".$fileActualExt;
                $img_dir = "losts_img/".$lost_id;
                move_uploaded_file($img_tmpName, $img_dir);
                echo "Uploaded";
            }
            else {
                echo "Picture exceeds 5mb limit";
            }
        }
        else{
            echo "There was an error uploading picture!";
        }
    }
    else {
        echo "You cannot upload files of this type!";
    }
    $chip_text_1 = $_POST['chip-text-1'];
    $chip_text_2 = $_POST['chip-text-2'];
    $chip_text_3 = $_POST['chip-text-3'];
    $chip_text_4 = $_POST['chip-text-4'];

    $sql = "insert into found(`lost_id`,`name`,`mob_or_rno`,`chip_text_1`,`chip_text_2`,`chip_text_3`,`chip_text_4`) value('$lost_id', '$name', '$mobrno', '$chip_text_1', '$chip_text_2', '$chip_text_3', '$chip_text_4')";
    $res = mysqli_query($conn, $sql);
    if($res){
        $_SESSION['message'] = "Posted";
        //header("Location: find.php");
    }


?>