<?php
session_start();
require 'dbConfig.php';

if(isset($_POST['delete_field']))
{
    $field_id = mysqli_real_escape_string($con, $_POST['delete_field']);

    $query = "DELETE FROM cropfields WHERE id='$field_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Field Deleted Successfully";
        header("Location: phpdatabasecrops.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Field Not Deleted";
        header("Location: phpdatabasecrops.php");
        exit(0);
    }
}

if(isset($_POST['update_field']))
{
    $CFID = mysqli_real_escape_string($con, $_POST['CropFieldID']);
    $IOCF = mysqli_real_escape_string($con, $_POST['ImageOfCropField']);
    $TOCF = mysqli_real_escape_string($con, $_POST['TypeOfCropfield']);
    $Tempr = mysqli_real_escape_string($con, $_POST['Temperature']);
    $TOC = mysqli_real_escape_string($con, $_POST['TimeOfCapture']);
    $DOC = mysqli_real_escape_string($con, $_POST['DateOfCapture']);
    $CIF = mysqli_real_escape_string($con, $_POST['CropInField']);

    $query = "UPDATE students SET CropFieldID='$CFID', ImageOfCropField='$IOCF', TypeOfCropfield='$TOCF', Temperature='$Tempr', TimeOfCapture='$TOC', DateOfCapture='$DOC', CropInField='$CIF' WHERE id='$field_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Field Updated Successfully";
        header("Location: phpdatabasecrops.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Field Not Updated";
        header("Location: phpdatabasecrops.php");
        exit(0);
    }

}


if(isset($_POST['save_cropfield']))
{
    $CFID = mysqli_real_escape_string($con, $_POST['CropFieldID']);
    $IOCF = mysqli_real_escape_string($con, $_POST['ImageOfCropField']);
    $TOCF = mysqli_real_escape_string($con, $_POST['TypeOfCropfield']);
    $Tempr = mysqli_real_escape_string($con, $_POST['Temperature']);
    $TOC = mysqli_real_escape_string($con, $_POST['TimeOfCapture']);
    $DOC = mysqli_real_escape_string($con, $_POST['DateOfCapture']);
    $CIF = mysqli_real_escape_string($con, $_POST['CropInField']);

    $query = "INSERT INTO cropfields(CropFieldID, ImageOfCropField, TypeOfCropfield, Temperature, TimeOfCapture, DateOfCapture, CropInField) VALUES('$CFID','$IOCF','$TOCF','$Tempr','$TOC','$DOC','$CIF')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Field Created Successfully";
        header("Location: field-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: field-create.php");
        exit(0);
    }
}

?>