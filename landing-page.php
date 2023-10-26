<?php


include 'code/config.php';
page_protect();

require('code/db.php');
require('code/db.php');

$emp_name = $_SESSION['employee_name'];
$emp_id   = $_SESSION['employee_id'];


$RS_user_level = get_emp_level($emp_id);
$UserLevel     = $RS_user_level['level'];

if ($UserLevel < 9) {

    header("Location:404.php?error=" . "You do not have access to this page this incident will be reported");
}


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-reboot.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-utilities.min.css" rel="stylesheet">
    <link href="assets/css/custom-bootstrap.css" rel="stylesheet">

</head>
<body>

<main class="form-signin">



</main>

<script src="index.js"></script>
</body>
</html>