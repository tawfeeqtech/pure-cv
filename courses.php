<?php



$GLOBALS["title"] = "Courses Information";
include_once '_header.php';
include "_conn.php";
$data = "SELECT * FROM courses";
$result = mysqli_query($conn , $data);

?>



    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3><?= $GLOBALS["title"]?></h3>
        </div>

        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col">
                            <div class="card py-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title d-flex">All Courses Data</h4>
<!--                                    <a class="d-flex btn btn-primary" href="addPerson.php?id=--><?//= $row['id']?><!--" >Edit</a>-->
                                </div>

                                <div class="card-body text-center">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered mb-0">
                                            <thead>
                                            <tr>
                                                <th rowspan="2">#</th>
                                                <th rowspan="2">Course Name</th>
                                                <th rowspan="2">Total Hours</th>
                                                <th colspan="2">Date</th>
                                                <th rowspan="2">Institution</th>
                                                <th rowspan="2">Attachment</th>
                                                <th rowspan="2">Notes</th>
                                            </tr>

                                            <tr>
                                                <th rowspan=''>From</th>
                                                <th rowspan=''>To</th>
                                            </tr>

                                            </thead>

                                            <tbody>

                                            <?php
                                            if(mysqli_num_rows($result) > 0){
                                                $count=0;
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $count ++;
                                                    ?>
                                            <tr>
                                                <td class="text-bold-500"><?=$count?></td>
                                                <td><?=$row['name']?></td>
                                                <td class="text-bold-500"><?=$row['hours']?></td>
                                                <td><?=$row['start_date']?></td>
                                                <td><?=$row['end_date']?></td>
                                                <td><?=$row['institution']?></td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary" href="viewCourse.php?id=<?= $row['id']?>">View</a>
                                                </td>
                                                <td><?=$row['notes']?></td>
                                            </tr>
                                                    <?php
                                                }
                                            }else{?>
                                                <td colspan="8" class="text-center"><h4 class="text-center"> <code>Please add course </code></h4></td>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>

    </div>

<?php include_once '_footer.php'; ?>