<?php
    
    
    function get_status_color(int $value): string {
        
        $status_color = "";
        
        if ($value == 1) {
            $status_color = "bg-success";
        } else {
            $status_color = 'bg-danger';
        }
        
        
        return $status_color;
    }