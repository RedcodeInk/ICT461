<?php 
// Include the database configuration file  
require_once 'dbConfig.php'; 
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["blob_binary"]["blob_name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['blob_binary']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $con->query("INSERT into tblblob (blob_id, blob_name, blob_binary, created) VALUES ('$imgContent', NOW())"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }
            ?>
                        <h4>Go to Home 
                            <a href="UploadImage.html" class="btn btn-danger float-end">Upload</a>
                        </h4> <br/>
                    <form action="upload.php" method="POST">
                            <div class="mb-3">
                            <label>Select Image File:</label>
                                 <input type="file" name="image">
                                <input type="submit" name="submit" value="Upload">
        </div>

                        </form>
                    <?php
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
        ?>
        <h4>Go to Home 
            <a href="UploadImage.html" class="btn btn-danger float-end">Upload</a>
        </h4> <br/>
    <form action="upload.php" method="POST">
            <div class="mb-3">
            <label>Select Image File:</label>
                 <input type="file" name="image">
                <input type="submit" name="submit" value="Upload">
</div>

        </form>
    <?php
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>