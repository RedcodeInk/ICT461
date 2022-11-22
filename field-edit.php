<?php
session_start();
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

    <title>Field Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Field Edit 
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
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="field_id" value="<?= $field['id']; ?>">

                                    <div class="mb-3">
                                <label>Field ID</label>
                                <input type="number" name="CropFieldID" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="ImageOfCropField" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>CropF type</label>
                                <input type="text" name="TypeOfCropfield" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Temperature</label>
                                <input type="number" name="Temperature" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Time Of Capture</label>
                                <input type="time" name="TimeOfCapture" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Date Of Capture</label>
                                <input type="date" name="DateOfCapture" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Crop in Field</label>
                                <input type="text" name="CropInField" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_cropfield" class="btn btn-primary">update Crop Field</button>
                            </div>

                                </form>
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