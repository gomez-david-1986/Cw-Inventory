<?php
    
    function getAllItems() {
        
        global $db;
        
        $query = 'SELECT * FROM mylogicw_inventory.item ';
        
        try {
            
            $statement = $db->prepare($query);
            
            $statement->execute();
            
            $Events = $statement->fetchAll();
            
            $statement->closeCursor();
            
        } catch (PDOException $exc) {
            error_log("Error -> delete_discount_table_single_entry -> " . $exc->getMessage());
            header("Location:404.php?error=" . $exc->getMessage());
            exit();
        }
        return $Events;
    }
    
    
    function  get_item_details($item_id) {
        
        global $db;
        
        $query = ' SELECT * FROM item WHERE item_id = :item_id';
        
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':item_id', $item_id);
            $statement->execute();
            
            $result = $statement->fetch();
            $statement->closeCursor();
            
            
        } catch (PDOException $exc) {
            error_log("Error -> getProjectProducts -> " . $exc->getMessage());
            header("Location:404.php?error=" . $exc->getMessage());
            exit();
        }
        return $result;
    }