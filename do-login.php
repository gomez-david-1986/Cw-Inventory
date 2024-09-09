<?php
    include 'code/config.php';
    include 'code/db.php';
    include 'code/employee_db.php';

    foreach ($_GET as $key => $value) {
        $DG[$key] = $value; // GET variables are filtered
    }

    foreach ($_POST as $key => $value) {
        $DP[$key] = $value; // POST variables are filtered
    }

    if ($DG['action'] == 'login') {

        $Email    = $DP['login-email'];
        $Password = $DP['login-password'];

        $rs = get_password_for_employee($Email);

        if (is_array($rs)) {
            if (password_verify($Password, $rs['email_pwd'])) {
                $employee_details = get_employee_log_in_details($rs['employee_id']);

                if (is_array($employee_details)) {
                    session_start();
                    session_regenerate_id(true);

                    // this sets variables in the session
                    $_SESSION['employee_id']     = $employee_details['employee_id'];
                    $_SESSION['employee_name']   = $employee_details['name'] . ' ' . $employee_details['last_name'];
                    $_SESSION['user_level'] = $employee_details['level'];
                    $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);

                    //                    $_SESSION['start_time'] = time();

                    if (99 == $employee_details['level']) {
                        header('Location:dashboard.php');           // SUPER USER
                    } else {
                        header('Location:login.php?Error4');
                    }
                } else {
                    // Error Fetching Customer Data
                    header('Location:login.php?Error1');
                }
            } else {
                // Password Is Not Valid
                header('Location:login.php?Error2');
            }
        } else {
            // Email Not Found On The DB
            header('Location:login.php?Error3');
        }

    }

    if ( $DG['action'] == 'logout') {
        logout();
    }


