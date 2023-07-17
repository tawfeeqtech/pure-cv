<?php
$course_id = '';
if (isset($_GET["id"]) && $_GET["id"] != '') {
    $course_id = $_GET["id"];
}

if ($course_id != '') {
    $GLOBALS["title"] = "Show Course";
} else {
    $GLOBALS["title"] = "Add Courses";
}

include '_header.php';
include 'actions.php';

if ($course_id != '') {

    $data = "SELECT * FROM courses where id = $course_id";
    $result = mysqli_query($conn, $data);
    $row = mysqli_fetch_assoc($result);

    $courseName = $row['name'];
    $hours = $row['hours'];
    $startDate = $row['start_date'];
    $endDate = $row['end_date'];
    $institution = $row['institution'];
    $url = $row['url'];




}


?>


<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading d-flex justify-content-between align-items-center">
        <h3 class="d-flex">Course Information's </h3>
        <a class="d-flex btn btn-secondary" href="courses.php" >Back</a>

    </div>

    <div class="page-content">
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="d-flex">Course "<?= $courseName?>"</h4>
                        <a class="d-flex btn btn-outline-primary" href="addCourse.php?id=<?= $row['id']?>" >Edit</a>

                    </div>
                    <div class="card-body">
                        <p class="text-muted">from <code><?= $startDate?></code> to <code><?= $endDate?></code>,
                            totally <code><?= $hours?></code> training hours.</p>

                        <p class="text-muted">Institution was "<code><?= $institution?></code>"</p>





                        <?php if (isInternalLink($url)) :?>
                            <img class="img-fluid w-100" src="uploads/<?= $url?>" alt="Card image cap">
                        <?php else : ?>
                            <p>the url link: <?= $url?> </p>
                        <?php endif; ?>

                        <small class="text-muted">Certificate File</small>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<?php include_once '_footer.php'; ?>