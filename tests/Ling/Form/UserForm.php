<?php

namespace Ling\Form;

class UserForm extends Form {

    public $userid;
    public $password;

    public function setRules() {
        $this->addRules(array(
            'userid' => array(
                'required' => true,
                'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
            ),
            'password' => array( // password can contains some weird value
                'required' => true,
                'filter' => FILTER_UNSAFE_RAW
            ),
        ));
    }

    public function validation()
    {
        $len = strlen($this->password);
        if ($len <= 4 || $len > 32) {
            $this->addError('password', 'length', 'password must be more than 4, less than 32');
        }
    }
}