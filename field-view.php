<?php
require 'dbConfig.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css.css" rel="stylesheet">

    <title>Field View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Field View Details 
                            <a href="phpdatabasecrops.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['CropFieldID']))
                        {
                            $field_id = mysqli_real_escape_string($con, $_GET['CropFieldID']);
                            $query = "SELECT * FROM cropfields WHERE CropFieldID='$field_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $field = mysqli_fetch_array($query_run);
                                ?>
                                    <div class="mb-3">
                                        <label>Image</label>
                                        <p class="form-control">
                                            <?=$field['ImageOfCropField'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>CropF type</label>
                                        <p class="form-control">
                                            <?=$field['TypeOfCropfield'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Temperature</label>
                                        <p class="form-control">
                                            <?=$field['Temperature'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Time Of Capture</label>
                                        <p class="form-control">
                                            <?=$field['TimeOfCapture'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Date Of Capture</label>
                                        <p class="form-control">
                                            <?=$field['DateOfCapture'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Crop In Field</label>
                                        <p class="form-control">
                                            <?=$field['CropInField'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>