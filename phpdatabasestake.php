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
    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"-->
     <link href="CSS.css" rel="stylesheet">


    <title>CROP FIELDS</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Crop Fields
                            <a href="StakeHolder.html" class="btn btn-primary float-end">Go Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>CropF Type</th>
                                    <th>Temperature</th>
                                    <th>TOC</th>
                                    <th>DOC</th>
                                    <th>Crop In Field</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM cropfields";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $cropf)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $cropf['CropFieldID']; ?></td>
                                                <td><?= $cropf['ImageOfCropField']; ?></td>
                                                <td><?= $cropf['TypeOfCropfield']; ?></td>
                                                <td><?= $cropf['Temperature']; ?></td>
                                                <td><?= $cropf['TimeOfCapture']; ?></td>
                                                <td><?= $cropf['DateOfCapture']; ?></td>
                                                <td><?= $cropf['CropInField']; ?></td>
                                                <td>
                                                    <a href="field-view.php?id=<?= $cropf['CropFieldID']; ?>" class="btn btn-info btn-sm">View</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="css.css"></script>

</body>
</html>