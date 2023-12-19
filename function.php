<?php



// function for uploading img into DB
function image_uploader($img_file){
    $img_file_tmp_name = $img_file['tmp_name'];
    $new_img_location = "image/new-img-".random_int(100000, 999999)."-".md5(random_int(1000000, 9999999)).$img_file['name'];

    $is_img_type_worng = false;

    if($img_file['type'] == "image/jpeg"){
        // reducing the jpg/jpeg image's size
        $img = imagecreatefromjpeg($img_file_tmp_name);
        imagejpeg($img, $new_img_location, 20);

    }else if($img_file['type'] == "image/png"){

        // reducing the png image's size
        $img = @imagecreatefrompng($img_file_tmp_name);
        imagepng($img, $new_img_location, 3);

    }else if(($img_file['type'] != '') && ($img_file['type'] != "image/jpg") && ($img_file['type'] != "image/png")){

        $is_img_type_worng = true;
        echo "<h3 class='my-3 text-danger text-center'>Sorry! Image type is not supported. Try to upload jpg/jpeg/png type image.</h3>";
    }

    // sending image to the db
    if($is_img_type_worng == false){

        
        
        $sql = "INSERT INTO image (image_url) VALUES ('$new_img_location')";
        $conn2 = mysqli_connect("localhost", "root", "", "img");
        mysqli_query($conn2, $sql);
       
        
        


    }

    
}




?>