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
    <div class="h5">Test Php & MySQL</div>
    <div class="h6"><?php echo $employeeID . " -> " . $employee_name . " -> " . $employee_level ?></div>
    <br>
    <div class="h5">Test Font Awesome</div>
    <i class="fa-solid fa-user"></i>
    <!-- uses solid style -->
    <i class="fa-brands fa-github-square"></i>
    <!-- uses brand style -->
</main>

<?php include_once 'include/html-footer.php' ?>
