<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css.css" rel="stylesheet">

    <title>Field Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Field Add 
                            <a href="phpdatabasecrops.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

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
                                <button type="submit" name="save_cropfield" class="btn btn-primary">Save Crop Field</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>