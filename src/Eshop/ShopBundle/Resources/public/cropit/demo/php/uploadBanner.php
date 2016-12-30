
<?php
$img = $_POST['img'];
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$year = time();
$img = file_put_contents('Images/Banners/'.$year.'.jpg', base64_decode($img));
echo $img;
?>
