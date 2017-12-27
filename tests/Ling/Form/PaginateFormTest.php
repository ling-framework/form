<?php

namespace Ling\Form;

use PHPUnit\Framework\TestCase;

include 'UserPaginateForm.php';

class PaginateFormTest extends TestCase {

    public function testPaginateForm() {
        $_SERVER['CONTENT_TYPE'] = 'text/html';
        $_GET['userid'] = 'fri13th';
        $_POST['password'] = 'usagi';
        $_GET['p'] = 1;
        $userPaginateForm = new UserPaginateForm();
        $this->assertEquals(1, $userPaginateForm->p);
    }
}