<?php

    function get_password_for_employee($Email) {

        global $db;

        $query = "SELECT employee_id, email_pwd  from employee where email = :Email and status = 'ACTIVE' ";

        try {

            $statement = $db->prepare($query);
            $statement->bindValue(":Email", $Email, PDO::PARAM_STR);

            $statement->execute();

            $Events = $statement->fetch();

            $statement->closeCursor();


            return $Events;
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    function get_employee_log_in_details($EmployeeID) {

        global $db;

        $query = 'SELECT employee_id, name, last_name,  level  from employee where employee_id = :EmployeeID ';

        $statement = $db->prepare($query);
        $statement->bindValue(':EmployeeID', $EmployeeID, PDO::PARAM_INT);

        $statement->execute();

        $Events = $statement->fetch();

        $statement->closeCursor();

        return $Events;
    }

    function get_emp_level($employee_id) {

        global $db;

        $query = 'SELECT employee.level  from employee where  employee_id = :EmployeeID limit 1';

        $statement = $db->prepare($query);
        $statement->bindValue(':EmployeeID', intval($employee_id), PDO::PARAM_INT);

        try {

            $statement->execute();

            $Events = $statement->fetch();

            $statement->closeCursor();


        } catch (PDOException $e) {
            header("Location:404.php?error=" . $e->getMessage());
        }

        return $Events;

    }
