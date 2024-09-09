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


        function get_item_status_color($Status): string {
        $status_color = '';

        if (!isset($Status)) {
            return '';
        } else {
            switch ($Status) {

                case "NEW":
                    $status_color = 'bg-success text-white';
                    break;
                case "USED":
                    $status_color = 'bg-mint text-dark';
                    break;
                case "BORROWED":
                    $status_color = 'bg-warning text-dark';
                    break;
                case "DAMAGE":
                    $status_color = 'bg-cyan';
                    break;
                case "BEING-REPAIRED":
                    $status_color = 'bg-indigo';
                    break;
                case "TO-BE-DISPOSE":
                    $status_color = 'bg-danger';
                    break;
                case "DISPOSED":
                    $status_color = 'bg-cyan-lgt text-black ';
                    break;
                case "TO-BE-WIPED":
                    $status_color = 'bg-orange  text-black';
                    break;
                case "OFFLINE":
                    $status_color = 'bg-light-subtle';
                    break;
                case "OUT-OF-STORE":
                    $status_color = 'bg-teal ';
                    break;
                case "FORFEIT":
                    $status_color = 'bg-pink text-white blink ';
                    break;
            }

            return $status_color;
        }
    }