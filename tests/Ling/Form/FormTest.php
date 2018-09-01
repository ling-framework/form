<?php

namespace Ling\Form;

use PHPUnit\Framework\TestCase;

include 'UserForm.php';


class FormTest extends TestCase {

    public function testForm() {
        $_SERVER['CONTENT_TYPE'] = 'text/html';
        $_GET['userid'] = 'fri13th';
        $_POST['password'] = 'usagi';
        $userForm = new UserForm();
        $this->assertFalse($userForm->error);
    }

    public function testJsonForm() {
        $_SERVER['CONTENT_TYPE'] = 'application/json';
        file_put_contents('php://output', '{"userid":"fri13th","password":"usagi"}');
        $userForm = new UserForm();
        $this->assertFalse($userForm->error);
    }

}
