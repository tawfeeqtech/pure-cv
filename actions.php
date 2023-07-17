<?php

include "_conn.php";

// Person
$nameErr = $genderErr = $birthDateErr = $countryErr = $cityErr = $jobTitleErr = $yearsExperienceErr = "";
$name = $gender = $birthDate = $country = $city = $jobTitle = $yearsExperience = "";

// course
$courseName = $hours = $startDate = $endDate = $institution = $url = $notes = '';
$courseNameErr = $hoursErr = $startDateErr = $endDateErr = $institutionErr = $urlErr = $notesErr = '';

//$experienceName = $experienceErr = '';

$message_required = "This field is required";

// add new product
if (($_SERVER["REQUEST_METHOD"] === "POST")) {

    if (isset($_POST['addExperience']) || isset($_POST['editExperience'])) {
        $course_id = userInput($_POST["course_id"])[0];

//        $experienceName = userInput($_POST["exp_name"], 'text')[0]; // entered value
//        $experienceErr = userInput($_POST["exp_name"], 'text')[1]; // error value

        $hours = userInput($_POST["hours"], 'number')[0];
        $hoursErr = userInput($_POST["hours"], 'number')[1];

        $institution = userInput($_POST["institution"])[0];
        $institutionErr = userInput($_POST["institution"])[1];

        $startDate = userInput($_POST["start_date"])[0];
        $startDateErr = userInput($_POST["start_date"])[1];

        $endDate = userInput($_POST["end_date"])[0];
        $endDateErr = userInput($_POST["end_date"])[1];

        $notes = userInput($_POST["notes"])[0];
        $notesErr = userInput($_POST["notes"])[1];

        //$experienceName !== '' &&
        //name,
        //'$experienceName' ,
        if ($institution !== '' && $hours !== '' && $startDate !== '' && $endDate !== '' && $notes !== '') {
            if (isset($_POST['addExperience'])) {
                $statement = "INSERT INTO experience(hours, start_date, end_date,institution,notes,course_id) 
                        VALUES('$hours' ,'$startDate' ,'$endDate','$institution','$notes','$course_id')";
            } elseif (isset($_POST['editExperience'])) {
//                $course_id = checkInput($_POST["course_id"]);
//                $statement = "UPDATE courses SET name = '$courseName', hours = '$hours', start_date = '$startDate', end_date = '$endDate', institution = '$institution', url= '$url', notes = '$notes' where id = $course_id";
            }

            if (mysqli_query($conn, $statement)) {
                header("location:experience.php");
            }
        }

    }

    if (isset($_POST['addCourse']) || isset($_POST['editCourse'])) {

        $courseName = userInput($_POST["course_name"])[0]; // entered value
        $courseNameErr = userInput($_POST["course_name"])[1]; // error value

        $institution = userInput($_POST["institution"])[0];
        $institutionErr = userInput($_POST["institution"])[1];

        $hours = userInput($_POST["hours"], 'number')[0];
        $hoursErr = userInput($_POST["hours"], 'number')[1];

        $startDate = userInput($_POST["start_date"])[0];
        $startDateErr = userInput($_POST["start_date"])[1];

        $endDate = userInput($_POST["end_date"])[0];
        $endDateErr = userInput($_POST["end_date"])[1];

        $notes = userInput($_POST["notes"])[0];
        $notesErr = userInput($_POST["notes"])[1];


        if (isset($_FILES['url']) && $_FILES['url']['size'] > 0) {
            $files = $_FILES["url"];
            $url = uploadImage($files);
        } else {
            if (empty($_POST["url"])) {
                $urlErr = $message_required;
            } else {
                $url = checkInput($_POST["url"]);
                $urlErr = '';
            }
        }


        //$data = array($courseName, $institution, $hours, $startDate, $endDate, $notes, $url);

        if ($courseName !== '' && $institution !== '' && $hours !== '' && $startDate !== '' && $endDate !== '' && $notes !== '' && $url !== '') {
            if (isset($_POST['addCourse'])) {
                $statement = "INSERT INTO courses(name, hours, start_date, end_date,institution,url,notes) 
                        VALUES('$courseName' , '$hours' ,'$startDate' ,'$endDate','$institution','$url','$notes')";
            } elseif (isset($_POST['editCourse'])) {
                $course_id = checkInput($_POST["course_id"]);
                $statement = "UPDATE courses SET name = '$courseName', hours = '$hours', start_date = '$startDate', end_date = '$endDate', institution = '$institution', url= '$url', notes = '$notes' where id = $course_id";
            }

            if (mysqli_query($conn, $statement)) {
                header("location:courses.php");
            }
        }

    }

    if (isset($_POST['addPerson']) || isset($_POST['editPerson'])) {
        $name = userInput($_POST["full_name"], 'text')[0]; // entered value
        $nameErr = userInput($_POST["full_name"], 'text')[1]; // error value

        $gender = userInput($_POST["gender"])[0];
        $genderErr = userInput($_POST["gender"])[1];

        $birthDate = userInput($_POST["birth_date"])[0];
        $birthDateErr = userInput($_POST["birth_date"])[1];

        $country = userInput($_POST["country"])[0];
        $countryErr = userInput($_POST["country"])[1];

        $city = userInput($_POST["city"])[0];
        $cityErr = userInput($_POST["city"])[1];

        $jobTitle = userInput($_POST["job_title"])[0];
        $jobTitleErr = userInput($_POST["job_title"])[1];

        $yearsExperience = userInput($_POST["years_experience"])[0];
        $yearsExperienceErr = userInput($_POST["years_experience"])[1];

        $uploadImage = '';

        if (isset($_FILES['img'])) {
            $files = $_FILES["img"];
            $uploadImage = uploadImage($files);

        }

        if ($name !== '' && $gender !== '' && $birthDate !== '' && $country !== '' && $city !== '' && $jobTitle !== '' && $yearsExperience !== '') {
            if (isset($_POST['addPerson'])) {
                $add = "INSERT INTO users(full_name, gender, birth_date, country,city,job_title,years_experience,img) 
                        VALUES('$name' , '$gender' ,'$birthDate' ,'$country','$city','$jobTitle','$yearsExperience','$uploadImage' )";
            } elseif (isset($_POST['editPerson'])) {
                $user_id = checkInput($_POST["user_id"]);
                $add = "UPDATE users SET full_name = '$name', gender = '$gender', birth_date = '$birthDate', country = '$country', city = '$city', job_title= '$jobTitle', years_experience = '$yearsExperience',  img = '$uploadImage' where id = $user_id";
            }

            if (mysqli_query($conn, $add)) {
                header("location:index.php");
            }
        }

    }
}