<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testNewUserRegistration()
    {
        $this->visit('register')
             ->type('xiaofang1', 'name')
             ->type('xiaofang@gmail.com', 'email')
             ->type('xiaofang1', 'password')
             ->type('xiaofang1', 'password_confirmation')
             ->press('Register');
             //->seePageIs('en/home');
    }
}
