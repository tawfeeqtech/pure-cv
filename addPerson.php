<?php
$user_id = '';
if (isset($_GET["id"]) && $_GET["id"] != '') {
    $user_id = $_GET["id"];
}

if ($user_id != '') {
    $GLOBALS["title"] = "Edit Person";
} else {
    $GLOBALS["title"] = "Add Person";
}

include '_header.php';
include 'actions.php';

if ($user_id != '') {
    $GLOBALS["title"] = "Edit Person";

    $data = "SELECT * FROM users where id = $user_id";
    $result = mysqli_query($conn , $data);
    $row = mysqli_fetch_assoc($result);


    $name = $row['full_name'];
    $gender = $row['gender'];
    $birthDate = $row['birth_date'];
    $country = $row['country'];
    $city = $row['city'];
    $jobTitle = $row['job_title'];
    $yearsExperience = $row['years_experience'];
}


?>


    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <?php if ($user_id != '') :?>
            <div class="page-heading d-flex justify-content-between align-items-center">
                <h3 class="d-flex"><?= $GLOBALS["title"] ?></h3>
                <a class="d-flex btn btn-secondary" href="index.php" >Back</a>

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
                                    <?php if ($user_id != '') :?>
                                        <input type="hidden" name="user_id" value="<?=$user_id; ?>">
                                    <?php endif;?>

                                    <div class="row">
                                        <div class="col-md-4 col-4">
                                            <?php if (isset($nameErr) && $nameErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="full-name-column">Full Name</label>
                                                    <input type="text" id="full-name-column" class="form-control"
                                                           placeholder="Full Name" value="<?= $name ?>"
                                                           name="full_name">
                                                </div>
                                            <?php else : ?>
                                                <label for="invalid-name">Full Name</label>
                                                <input type="text" class="form-control is-invalid" id="invalid-name"
                                                       placeholder="Full Name" value="<?= $name ?>" name="full_name">
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $nameErr ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-4 col-4">
                                            <?php if (isset($birthDateErr) && $birthDateErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="birth-of-date-column">Birth of Date</label>
                                                    <input type="date" id="birth-of-date-column" class="form-control"
                                                           placeholder="Birth OF Date" value="<?= $birthDate ?>"
                                                           name="birth_date">
                                                </div>
                                            <?php else : ?>
                                                <label for="BirthDate">Birth of Date</label>
                                                <input type="date" class="form-control is-invalid" id="BirthDate"
                                                       placeholder="Birth of Date" value="<?= $birthDate ?>"
                                                       name="birth_date">
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $birthDateErr ?>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                        <div class="col-md-4 col-4">
                                            <div class="form-group">
                                                <label for="gender-column" class="py-2 pt-0">Gender</label>
                                                <ul class="list-unstyled mb-0 ">
                                                    <li class="d-inline-block me-2 mb-1">
                                                        <div class="form-check ">
                                                            <input class="form-check-input " type="radio" name="gender"
                                                                   value="male" <?php if (isset($gender) && $gender == "male") echo "checked"; ?>
                                                                   checked>
                                                            <label class="form-check-label">
                                                                Male
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="d-inline-block me-2 mb-1">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="female"
                                                                   name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> >
                                                            <label class="form-check-label">
                                                                Female
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>


                                        <div class="col-md-4 col-4">
                                            <?php if (isset($countryErr) && $countryErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input type="text" id="country" class="form-control" name="country"
                                                           value="<?= $country ?>" placeholder="Country">
                                                </div>
                                            <?php else : ?>
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control is-invalid" id="country"
                                                       name="country" placeholder="Country" value="<?= $country ?>">
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $countryErr ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-4 col-4">
                                            <?php if (isset($cityErr) && $cityErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input type="text" id="city" class="form-control" name="city"
                                                           value="<?= $city ?>" placeholder="City">
                                                </div>
                                            <?php else : ?>
                                                <label for="city">City</label>
                                                <input type="text" class="form-control is-invalid" id="city" name="city"
                                                       placeholder="city" value="<?= $city ?>">
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $cityErr ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <?php if (isset($jobTitleErr) && $jobTitleErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="job-title">Job Title</label>
                                                    <input type="text" id="job-title" class="form-control"
                                                           placeholder="job title" value="<?= $jobTitle ?>"
                                                           name="job_title">
                                                </div>
                                            <?php else : ?>
                                                <label for="job-title">Job Title</label>
                                                <input type="text" class="form-control is-invalid" id="job-title"
                                                       placeholder="job title" value="<?= $jobTitle ?>"
                                                       name="job_title">
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $jobTitleErr ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <?php if (isset($yearsExperienceErr) && $yearsExperienceErr == '')   : ?>
                                                <div class="form-group">
                                                    <label for="years-experience">Years Experience</label>
                                                    <input type="text" id="years-experience" class="form-control"
                                                           placeholder="years experience"
                                                           value="<?= $yearsExperience ?>" name="years_experience">
                                                </div>
                                            <?php else : ?>
                                                <label for="years-experience">Years Experience</label>
                                                <input type="text" class="form-control is-invalid" id="years-experience"
                                                       placeholder="years experience" name="years_experience"
                                                       value="<?= $yearsExperience ?>">
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    <?= $yearsExperienceErr ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="image">image</label>
                                                <input class="form-control" type="file" name="img" id="image">
                                            </div>

                                        </div>


                                        <div class="col-12 d-flex justify-content-end">
                                            <?php if ($user_id != '') :?>
                                                <input class="btn btn-primary me-1 mb-1" type="submit" value="Edit" name="editPerson">
                                            <?php else : ?>
                                                <input class="btn btn-primary me-1 mb-1" type="submit" value="Submit" name="addPerson">
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