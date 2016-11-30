<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel')
             ->dontsee('Rail');
        //$this->visitRoute('profile', ['user' => 1]);
        $this->visitRoute('about');
        $this->visit('/')
             ->click('Login')
             ->seePageIs('en/login')
             ->seeRouteIs('login');

    }
}
