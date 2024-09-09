<?php
    include 'code/config.php';
    page_protect();
    require('code/db.php');
    require('code/employee_db.php');

    $employee_name = $_SESSION['employee_name'];
    $employeeID    = $_SESSION['employee_id'];

    $RS_user_level  = get_emp_level($employeeID);
    $employee_level = $RS_user_level['level'];

?>
<?php include_once 'include/html-head.php' ?>
<?php include_once 'include/html-header.php' ?>

<main>



</main>




<?php include_once 'include/html-footer.php' ?>
