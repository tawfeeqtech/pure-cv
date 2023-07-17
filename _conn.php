<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "cv_project";

$conn = mysqli_connect($server, $user, $pass, $db);
if (!$conn) {
    die(musqli_connect_error());
}
