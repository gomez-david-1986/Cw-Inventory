<?php
    
    function get_all_event_log() {
        
        global $db;
        
        $query = 'SELECT * FROM mylogicw_inventory.equipment_event_log';
        
        try {
            
            $statement = $db->prepare($query);
            $statement->execute();
            $Events = $statement->fetchAll();
            $statement->closeCursor();
            
        } catch (PDOException $exc) {
            error_log("Error -> get_all_event_log() -> " . $exc->getMessage());
            header("Location:404.php?error=" . $exc->getMessage());
            exit();
        }
        return $Events;
    }
    
    
    function  get_equipment_event_log_for_item($item_id) {
        
        global $db;
        
        $query = ' SELECT * FROM equipment_event_log WHERE item_id = :item_id';
        
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':item_id', $item_id);
            $statement->execute();
            
            $result = $statement->fetchAll();
            $statement->closeCursor();
            
            
        } catch (PDOException $exc) {
            error_log("Error -> get_event_log_for_item() -> " . $exc->getMessage());
            header("Location:404.php?error=" . $exc->getMessage());
            exit();
        }
        return $result;
    }