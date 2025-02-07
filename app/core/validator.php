<?php

namespace app\core;

class Validator {
    private $errors = [];

    
    //Check if a value is not empty
    
    public function required($value, $field) {
        if (empty($value)) {
            $this->errors[$field] = "The {$field} field is required";
            return false;
        }
        return true;
    }

    //Validate email format
   
    public function email($email, $field) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = "The {$field} must be a valid email address";
            return false;
        }
        return true;
    }

    //Validate minimum length

    public function minLength($value, $min, $field) {
        if (strlen($value) < $min) {
            $this->errors[$field] = "The {$field} must be at least {$min} characters";
            return false;
        }
        return true;
    }

    //Validate maximum length

    public function maxLength($value, $max, $field) {
        if (strlen($value) > $max) {
            $this->errors[$field] = "The {$field} must not exceed {$max} characters";
            return false;
        }
        return true;
    }
    


    
    //Get all validation errors

    public function getErrors() {
        return $this->errors;
    }

    // Check if validation has errors
 
    public function hasErrors() {
        return !empty($this->errors);
    }

    //Clear all validation errors

    public function clearErrors() {
        $this->errors = [];
    }
}
