<?php

namespace App\Controllers\Admin;

/**
 * User admin controller
 */
class Users extends \Core\Controller
{
    protected function before()
    {
        // Make sure an admin user is logged in for example
        // return false;
    }

    public function indexAction()
    {
        echo 'User admin index';
    }
}
