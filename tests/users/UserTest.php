<?php

use App\User;
use App\Role;

class UserTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
    }

    public function test_is_member_of()
    {
        $admin = User::find(10);
        $abdi = User::find(6);

        $this->assertTrue(true, $admin->isAdmin());
        $this->assertFalse(false, $admin->isAuthor());
        $this->assertFalse(false, $admin->isSuperAdmin());

        $this->assertTrue(true, $abdi->isAuthor());
        $this->assertFalse(false, $abdi->isAdmin());
    }

}
