<?php
$course_id = '';
if (isset($_GET["id"]) && $_GET["id"] != '') {
    $course_id = $_GET["id"];
}

if ($course_id != '') {
    $GLOBALS["title"] = "Edit Course";
} else {
    $GLOBALS["title"] = "Add Courses";
}

include '_header.php';
include 'actions.php';

if ($course_id != '') {

    $data = "SELECT * FROM courses where id = $course_id";
    $result = mysqli_query($conn, $data);
    $row = mysqli_fetch_assoc($result);
//    name	hours	start_date	end_date	institution	url	notes

    $courseName = $row['name'];
    $hours = $row['hours'];
    $startDate = $row['start_date'];
    $endDate = $row['end_date'];
    $institution = $row['institution'];
    $url = $row['url'];
    $notes = $row['notes'];


}


?>


    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <h3><?= $GLOBALS["title"] ?></h3>
        </div>

        <div class="page-content">
            <div class="row ">
                <div class="col-12">
                    <div class="card px-4 py-4">

                        <div class="card-content">
                            <div class="card-body">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                                      enctype="multipart/form-data">
                                    <?php if ($course_id != '') : ?>
                                        <input type="hidden" name="course_id" value="<?= $course_id; ?>">
                                    <?php endif; ?>

                                    <div class="row">
                                        <div class="col-md-4 col-4">
                                            <?php if (isset($courseNameErr) && $courseNameErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="course-name">Course Name</label>
                                                    <input type="text" class="form-control" id="course-name"
                                                           placeholder="Course Name" value="<?= $courseName ?>"
                                                           name="course_name">
                                                </div>
                                            <?php else : ?>
                                                <label for="course-name">Course Name</label>
                                                <input type="text" class="form-control is-invalid" id="course-name"
                                                       placeholder="Course Name" value="<?= $courseName ?>"
                                                       name="course_name">
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $courseNameErr ?>
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
                                            <?php if (isset($hoursErr) && $hoursErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="course-hours">Number Of Hours:</label>
                                                    <input type="number" class="form-control" id="course-hours"
                                                           placeholder="Number Of Hours" value="<?= $hours ?>"
                                                           name="hours">
                                                </div>
                                            <?php else : ?>
                                                <label for="course-hours">Number Of Hours:</label>
                                                <input type="number" class="form-control is-invalid" id="course-hours"
                                                       placeholder="Number Of Hours" value="<?= $hours ?>" name="hours">
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $hoursErr ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <?php if (isset($startDateErr) && $startDateErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="start-date">Start Date:</label>
                                                    <input type="date" id="start-date" class="form-control"
                                                           placeholder="Start Date" value="<?= $startDate ?>"
                                                           name="start_date">
                                                </div>
                                            <?php else : ?>
                                                <label for="start-date">Start Date:</label>
                                                <input type="date" class="form-control is-invalid" id="start-date"
                                                       placeholder="Start Date" value="<?= $startDate ?>"
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
                                        <div class="col-md-4 col-4">
                                        </div>
                                        <div class="col-md-3 col-3">
                                            <div class="form-group">
                                                <label for="image">Attachment</label>
                                            </div>

                                            <div class="list-group list-group-horizontal-sm mb-1 text-center"
                                                 role="tablist">
                                                <a class="list-group-item list-group-item-action active"
                                                   id="list-sunday-list" data-bs-toggle="list" href="#list-sunday"
                                                   role="tab" aria-selected="true">File</a>
                                                <a class="list-group-item list-group-item-action" id="list-monday-list"
                                                   data-bs-toggle="list" href="#list-monday" role="tab"
                                                   aria-selected="false">URL</a>
                                            </div>

                                            <div class="tab-content text-justify">
                                                <div class="tab-pane fade active show" id="list-sunday" role="tabpanel"
                                                     aria-labelledby="list-sunday-list">
                                                    <div class="form-group">
                                                        <label for="url"></label>

                                                        <input class="form-control" type="file" name="url" id="url">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="list-monday" role="tabpanel"
                                                     aria-labelledby="list-monday-list">
                                                    <?php if (isset($urlErr) && $urlErr == '')   : ?>
                                                        <div class="form-group">
                                                            <label for="url"></label>
                                                            <input type="text" class="form-control" id="url"
                                                                   placeholder="url" value="<?= $url ?>" name="url">
                                                        </div>
                                                    <?php else : ?>
                                                        <label for="url"></label>
                                                        <input type="text" class="form-control is-invalid" id="url"
                                                               placeholder="url" value="<?= $url ?>" name="url">
                                                        <div class="invalid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            <?= $urlErr ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="col-md-12 col-12">
                                            <?php if (isset($notesErr) && $notesErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="notes">Notes:</label>

                                                    <textarea class="form-control" id="notes" rows="3" name="notes"><?= $notes ?></textarea>

                                                </div>
                                            <?php else : ?>
                                                <label for="notes">Notes</label>

                                                <textarea class="form-control is-invalid" id="notes" rows="3" name="notes"><?= $notes ?></textarea>

                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $notesErr ?>

                                                </div>
                                            <?php endif; ?>

                                        </div>


                                        <div class="col-12 d-flex justify-content-end">
                                            <?php if ($course_id != '') : ?>
                                                <input class="btn btn-primary me-1 mb-1" type="submit" value="Edit"
                                                       name="editCourse">
                                            <?php else : ?>
                                                <input class="btn btn-primary me-1 mb-1" type="submit" value="Save"
                                                       name="addCourse">
                                            <?php endif; ?>

                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset
                                            </button>
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