<?php
namespace Ling\Form;
abstract class Form {
    public $sanitizeRules = array();
    public $errors = array();
    public $error = false;

    protected function addRules($rules) {
        $this->sanitizeRules = array_merge($this->sanitizeRules, $rules);
    }

    public function __construct(){
        $this->setRules();
        $results = null;
        // $_SERVER['CONTENT_TYPE'] is set when POST only
        if (isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] === 'application/json') {
            $results = (array)json_decode(file_get_contents('php://input'));
        }
        if (!$results) {
            $results = filter_var_array($_GET + $_POST, $this->sanitizeRules);
        }

        $this->sanitizeAndRequiredCheck($results);
        $this->validation();
    }

    public function sanitizeAndRequiredCheck($results) {
        foreach ($this->sanitizeRules as $param => $rule) {
            $result = $results[$param];
            $result = is_string($result) ? trim($result) : $result;
            $this->$param = ($result !== null && $result !== '') ? $result : $rule['default'];
            $rule = $this->sanitizeRules[$param];
            if (isset($rule['required']) && $rule['required'] && !isset($results[$param])) {
                $this->errors[$param] = array('required');
            }
            $results[$param] = $result;
        }
    }

    public function addError($param, $errorCode, $message){
        $this->errors[$param] = array($errorCode, $message);
        $this->error = true;
    }

    abstract public function setRules();
    abstract public function validation();
}
