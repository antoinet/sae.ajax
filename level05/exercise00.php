<?php

    $name = "";
    $email = "";
    $comment = "";
    $website = "";

    $result = array("status" => "", "errors" => array());
    
    $all_valid = true;
    $all_valid &= validate_name($_REQUEST["name"]);
    $all_valid &= validate_email($_REQUEST["email"]);
    $all_valid &= validate_comment($_REQUEST["comment"]);
    $all_valid &= validate_website($_REQUEST["website"]);

    if ($all_valid) {
        $result["status"] = "ok";
    } else {
        $result["status"] = "error";
    }

    if (!empty($_REQUEST["validate"])) {
        header("Content-Type: application/json");
        echo json_encode($result);
    } else {
        header("Content-Type: text/html");
        if ($all_valid) {
            echo "<html><body><h1>Registration Succesful!</h1></body></html>";
        } else {
            echo "<html><body><h1>Registration Failed!</h1></body></html>";
        }
    }
        

    function validate_name($name) {
        global $result;
        $name = trim($name);
        
        // name is a required field
        if (empty($name)) {
            array_push($result["errors"], array("name" => "name is required")); 
            return false;
        }
        
        // check if name is already used
        // (this is actually a fake check,
        // it returns true if the letter a is found in the name).
        if (strpos($name, 'a') !== false) {
            array_push($result["errors"], array("name" => "name already used"));
            return false;
        }
        
        return true;
    }

    function validate_email($email) {
        global $result;
        $email = trim($email);
        
        // email is a required field
        if (empty($email)) {
            array_push($result["errors"], array("email" => "email is required"));
            return false;
        }
        
        // reject invalid email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($result["errors"], array("email" => "invalid email format"));
            return false;   
        }
        
        return true;
    }

    function validate_comment($comment) {
        global $result;
        $comment = trim($comment);
        
        // comment cannot be longer than 50 characters
        if (strlen($comment) > 50) {
            array_push($result["errors"], array("comment" => "comment is too long"));
            return false;
        }
        
        return true;
    }

    function validate_website($website) {
        global $result;
        $website = trim($website);
        
        if (!empty($website)) {
            // reject invalid URL format
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                array_push($result["errors"], array("website" => "invalid URL"));
                return false;
            }
        }
        
        return true;
    }
?>