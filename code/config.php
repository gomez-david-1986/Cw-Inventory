<?php

    setlocale(LC_MONETARY, "en_US.UTF-8");
    date_default_timezone_set('America/New_York');

    global $template;

    $template = [
        'name' => 'Template',
        'version' => '1.0',
        'author' => 'David Gomez',
        'robots' => 'noindex, nofollow',
        'title' => "Title",
        'description' => 'Description'];


    function page_protect(): void {

        session_start();

        /* Secure against Session Hijacking by checking user agent */
        if (isset($_SESSION['HTTP_USER_AGENT'])) {
            if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
                logout();
                exit;
            }
        }

        /* If session not set, check for cookies set by Remember me */
        if (!isset($_SESSION['employee_id']) && !isset($_SESSION['employee_name'])) {

            logout();
            exit();

        }

    }


    function logout() {

        session_start();
        session_unset();
        session_destroy();

        header("Location: login.php");
    }
