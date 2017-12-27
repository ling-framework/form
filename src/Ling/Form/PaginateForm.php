<?php
namespace Ling\Form;

abstract class PaginateForm extends Form {
    public $p;

    public function __construct(){
        $this->addRules(array(
            'p' => array(
                'filter' => FILTER_SANITIZE_NUMBER_INT,
                'default' => 1
            )
        ));
        parent::__construct();
    }
}
