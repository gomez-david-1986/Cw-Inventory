<?php

    $dns      = 'mysql:host=localhost;dbname=mylogicw_inventory';
    $username = 'mylogicw_dgmaya';
    $password = 'je*qZ0OHit4,@bD+mO';

    try {

        $db = new PDO($dns, $username, $password);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    } catch (Exception $ex) {

        $Error_Message = $ex->getMessage();
        header("location:404.php?error=" . $Error_Message);
        die();
    }
