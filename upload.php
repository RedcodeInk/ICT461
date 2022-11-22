<?php 
                // Include the database configuration file  
                require_once 'dbConfig.php'; 

                // Get image data from database 
                $result = $con->query("SELECT image FROM images ORDER BY id DESC"); 
                
                 //--------resize image --------
                // File and new size

                //file name// stringF
                $im ='R.png';
                //end of filename//StringF

                $fname = $im;  //file name assigned to $fname from $result for each image
                //set $percent value <1 for shrinking and $percent value >1 for expanding
                    $per = 0.3;

                //Generate new size parameters
                list($width, $height) = getimagesize($fname);
                $new_w = $width * $per;
                $new_h = $height * $per;

                // Load image
                $output = imagecreatetruecolor($new_w, $new_h);
                $source = imagecreatefromjpeg($fname);
                    
                // Resize the source image to new size
                imagecopyresized($output, $source, 0, 0, 0, 0, $new_w, $new_h, $width, $height);
                //Display Output 
                imagejpeg($output);
                //--------End of resize image --------


                ?>
            <br><br>
            <?php 
                //if($result->num_rows > 0)
                if($output->num_rows > 0)

                {   ?> 
                        <div> 
                            <?php //while($row = $result->fetch_assoc()){ 
                                while($row = $output->fetch_assoc()){ ?> 
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
                            <?php } ?> 
                        </div> 
                    <?php 
                }
                else
                {   ?> 
                        <p class="status error">Image(s) not found...</p> 
            <?php } ?>