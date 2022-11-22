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

     <style>
        body
        {
            background-image: url(https://c.pxhere.com/photos/b5/4c/harvester_harvest_farming_soybean_sunset_agriculture_equipment_landscape-392994.jpg!d);
            background-color: #cccccc; 
            fill-opacity: 20%;
            background-size: 100% 100%;
            background-repeat:inherit;
            background-size: cover;
        }
        

        span{
            color: #402D22;
        }
    </style>

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
                            <a href="field-create.php" class="btn btn-success btn-sm flex">Add Field</a>
                            <a href="FarmManager.html" class="btn btn-primary flex">Go Back</a>
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
                                                    <a href="field-edit.php?id=<?= $cropf['CropFieldID']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_field" value="<?=$cropf['CropFieldID'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
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