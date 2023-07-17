<?php



$GLOBALS["title"] = "Personal Information";
include_once '_header.php';
include "_conn.php";
$data = "SELECT * FROM users";
$result = mysqli_query($conn , $data);
$row = mysqli_fetch_assoc($result);

$full_name = isset($row['full_name']) ? $row['full_name'] : '';

$gender = isset($row['gender']) ? $row['gender'] : '';
$birth_date = isset($row['birth_date']) ? $row['birth_date'] : '';
$country = isset($row['country']) ? $row['country'] : '';
$city = isset($row['city']) ? $row['city'] : '';
$job_title = isset($row['job_title']) ? $row['job_title'] : '';
$years_experience = isset($row['years_experience']) ? $row['years_experience'] : '';
$img = isset($row['img']) ? $row['img'] : '';

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
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col">
                            <div class="card py-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title d-flex">Personal Data</h4>
                                    <a class="d-flex btn btn-primary" href="addPerson.php?id=<?= $row['id']?>" >Edit</a>
                                </div>

                                <div class="card-body">

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 ms-3">Full Name:</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0"><?= $full_name?></h5>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 ms-3">Gender:</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0"><?= $gender ?></h5>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 ms-3">birth_date:</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0"><?= $birth_date?></h5>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 ms-3">country:</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0"><?= $country?></h5>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 ms-3">city:</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0"><?= $city?></h5>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 ms-3">job_title:</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0"><?= $job_title?></h5>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 ms-3">years_experience:</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-0"><?= $years_experience?></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-content pt-4 pb-3 px-5">
                            <img class="rounded mx-auto d-block " style="width: 20.4rem;" src="uploads/<?= $img?>" alt="Person image " >
                        </div>
                    </div>


                </div>
            </section>
        </div>

    </div>

<?php include_once '_footer.php'; ?>