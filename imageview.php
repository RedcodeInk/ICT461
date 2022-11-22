<?php

session_start();
require 'dbConfig.php';

//$db = mysqli_connect("localhost","root","","DbName"); 


if(isset($_GET['CropFieldID']))
{
$id = mysqli_real_escape_string($con, $_GET['CropFieldID']);
$sql = "SELECT ImageOfCropField FROM cropfields WHERE CropFieldID = $id";
$sth = $db->query($con, $sql);

if(mysqli_num_rows($query_run) > 0)
    {
        $result=mysqli_fetch_array($sth);
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>';
    }
    else echo "<h4>No image found</h4>";
}
?>