<?php



$GLOBALS["title"] = "Experience Information";
include_once '_header.php';
include "_conn.php";
//$data = "SELECT * FROM experience";
    $data = "SELECT experience.* ,courses.name as course_name FROM experience INNER JOIN courses ON experience.course_id = courses.id ";

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
                                    <h4 class="card-title d-flex">All Experience Information</h4>
                                </div>

                                <div class="card-body">
                                    <?php
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result)){ ?>
                                            <h4 ><sub> <?=$row['course_name']?> / <code><?= $row['institution']?></code> </sub> </h4>
                                            <h6 class="pt-4">From <?=$row['start_date']?> to <?=$row['end_date']?></h6>
                                            <small class="text-muted">
                                                <?= $row['notes'] ?>
                                            </small>
                                            <br><br>
                                            <?php
                                        }
                                    }else{ ?>
                                        <h4 class="text-center"> <code>Please add experience</code></h4>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>

    </div>

<?php include_once '_footer.php'; ?>