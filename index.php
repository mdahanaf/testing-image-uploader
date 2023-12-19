<?php

require('./function.php');

?>


<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image_file" id="">
    <input name='iamge_submit_btn' type="submit" value="Submit image">

</form>

<?php

if(isset($_REQUEST['iamge_submit_btn'])){
    $image_file = $_FILES['image_file'];
    image_uploader($image_file);
}


$sql = "SELECT * FROM image";
$data = mysqli_query($conn, $sql);
$all_img = mysqli_fetch_all($data, MYSQLI_NUM);



for($i = 0; $i < count($all_img); $i++){
    $serial = $i + 1;
    $imgg = $main_domain.'/'.$all_img[$i][1];

    echo "$serial => <a href='$imgg' target='_blank'>$imgg</a> <br><br>";
}
?>




