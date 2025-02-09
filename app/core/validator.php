<?php
namespace App\Core;

class Validator {

    private $errors = [];

    public function validate($data, $rules) {

        foreach ($rules as $field => $ruleString) {
            $ruleList = explode('|', $ruleString);
            
            foreach ($ruleList as $rule) {
                $param = null;
                if (strpos($rule, ':') !== false) {
                    [$rule, $param] = explode(':', $rule);
                }

                $value = $data[$field] ?? null;

                if ($rule === 'required' && empty($value)) {
                    $this->addError($field, "The $field field is required");
                }

                if ($rule === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($field, "Invalid email format");
                }

                if ($rule === 'min' && strlen($value) < $param) {
                    $this->addError($field, "The $field must be at least $param characters");
                }   
            }
        }

        return empty($this->errors);
    }

 

    public function addError($field, $message) {
        $this->errors[$field][] = $message;
    }

    public function getErrors() {
        return $this->errors;
    }
}