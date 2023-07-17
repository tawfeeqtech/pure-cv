<?php
$exp_id = '';
if (isset($_GET["id"]) && $_GET["id"] != '') {
    $exp_id = $_GET["id"];
}


$GLOBALS["title"] = "Add Experience";


include '_header.php';
include 'actions.php';

if ($exp_id != '') {
    $GLOBALS["title"] = "Edit Experience";

    $data = "SELECT * FROM experience where id = $exp_id";
//    $data = "SELECT experience.* ,courses.name as course_name FROM experience INNER JOIN courses ON experience.course_id = courses.id WHERE experience.id = $exp_id;";
    $result = mysqli_query($conn , $data);
    $row = mysqli_fetch_assoc($result);
//    var_dump($row);
//    exit;

//
    //$name = $row['name'];
    $hours = $row['hours'];
    $institution = $row['institution'];
    $startDate = $row['start_date'];
    $endDate = $row['end_date'];
    $notes = $row['notes'];
}

$coursesData = "SELECT * FROM courses";
$resultData = mysqli_query($conn , $coursesData);


?>


    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <?php if ($exp_id != '') :?>
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h3 class="d-flex"><?= $GLOBALS["title"] ?></h3>
                <a class="d-flex btn btn-secondary" href="experience.php" >Back</a>

            </div>
        <?php else : ?>
        <div class="page-heading">
            <h3><?= $GLOBALS["title"] ?></h3>
        </div>
        <?php endif; ?>

        <div class="page-content">
            <div class="row ">
                <div class="col-12">
                    <div class="card px-4 py-4">

                        <div class="card-content">
                            <div class="card-body">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                    <?php if ($exp_id != '') :?>
                                        <input type="hidden" name="exp_id" value="<?=$exp_id; ?>">
                                    <?php endif;?>

                                    <div class="row">

                                        <!--<div class="col-md-4 col-4">
                                            <php if (isset($experienceErr) && $experienceErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="exp_name">experience name</label>
                                                    <input type="text" id="exp_name" class="form-control"
                                                           name="exp_name"
                                                           value="<= $experienceName ?>" placeholder="experience name">
                                                </div>
                                            <php else : ?>
                                                <label for="exp_name">experience name</label>
                                                <input type="text" class="form-control is-invalid" id="exp_name"
                                                       name="exp_name"
                                                       placeholder="experience name" value="<= $experienceName ?>">
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <= $experienceErr ?>
                                                </div>
                                            <php endif; ?>
                                        </div>-->

                                        <div class="col-md-4 col-4">

                                            <fieldset class="form-group">
                                            <label for="course_id">Course Name:</label>

                                            <select class="form-select" name="course_id" id="course_id">
                                                <?php
                                                    if(mysqli_num_rows($resultData) > 0){
                                                        while($row = mysqli_fetch_assoc($resultData)){
                                                ?>
                                                    <option value="<?=$row['id']?>"><?=$row['name']?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>

                                        </fieldset>

                                        </div>

                                        <div class="col-md-4 col-4">
                                            <?php if (isset($hoursErr) && $hoursErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="hours">Number Of Hours:</label>
                                                    <input type="number" class="form-control" id="hours"
                                                           placeholder="Number Of Hours" value="<?= $hours ?>"
                                                           name="hours">
                                                </div>
                                            <?php else : ?>
                                                <label for="hours">Number Of Hours:</label>
                                                <input type="number" class="form-control is-invalid" id="hours"
                                                       placeholder="Number Of Hours" value="<?= $hours ?>" name="hours">
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $hoursErr ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <?php if (isset($institutionErr) && $institutionErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="institution">Institution</label>
                                                    <input type="text" id="institution" class="form-control"
                                                           name="institution"
                                                           value="<?= $institution ?>" placeholder="Institution">
                                                </div>
                                            <?php else : ?>
                                                <label for="institution">Institution</label>
                                                <input type="text" class="form-control is-invalid" id="institution"
                                                       name="institution"
                                                       placeholder="institution" value="<?= $institution ?>">
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $institutionErr ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <?php if (isset($startDateErr) && $startDateErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="start-date">Start Date</label>
                                                    <input type="date" id="start-date" class="form-control"
                                                           placeholder="start date" value="<?= $startDate ?>"
                                                           name="start_date">
                                                </div>
                                            <?php else : ?>
                                                <label for="start-date">Start Date</label>
                                                <input type="date" class="form-control is-invalid" id="start-date"
                                                       placeholder="start date" value="<?= $startDate ?>"
                                                       name="start_date">
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $startDateErr ?>
                                                </div>
                                            <?php endif; ?>

                                        </div>

                                        <div class="col-md-4 col-4">
                                            <?php if (isset($endDateErr) && $endDateErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="end-date">End Date:</label>
                                                    <input type="date" id="end-date" class="form-control"
                                                           placeholder="End Date" value="<?= $endDate ?>"
                                                           name="end_date">
                                                </div>
                                            <?php else : ?>
                                                <label for="end-date">End Date:</label>
                                                <input type="date" class="form-control is-invalid" id="end-date"
                                                       placeholder="End Date" value="<?= $endDate ?>"
                                                       name="end_date">
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $endDateErr ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>



                                        <div class="col-md-12 col-12">
                                            <?php if (isset($notesErr) && $notesErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="notes">Notes:</label>
                                                    <textarea class="form-control" id="notes" rows="3" name="notes"><?= $notes ?></textarea>
                                                    <!--<input type="text" id="notes" class="form-control"
                                                           placeholder="notes"
                                                           value="</*= $notes */?>" name="notes">-->
                                                </div>
                                            <?php else : ?>
                                                <label for="notes">Notes</label>
                                                <!--<input type="text" class="form-control is-invalid" id="notes"
                                                       placeholder="notes" name="notes"
                                                       value="</*= $notes */?>">-->
                                                <textarea class="form-control is-invalid" id="notes" rows="3" name="notes"><?= $notes ?></textarea>

                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $notesErr ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>



                                        <div class="col-12 d-flex justify-content-end">
                                            <?php if ($exp_id != '') :?>
                                                <input class="btn btn-primary me-1 mb-1" type="submit" value="Edit" name="editExperience">
                                            <?php else : ?>
                                                <input class="btn btn-primary me-1 mb-1" type="submit" value="Submit" name="addExperience">
                                            <?php endif;?>

                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php include_once '_footer.php'; ?>