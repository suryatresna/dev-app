<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InterfaceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLink()
    {
        $this->visit('/')
        		->click('Sign-Up')
        		->seePageIs('/signup');
    }

    public function testSignup()
    {
    	$user = factory(App\User::class)->make();
    	$this->visit('/signup')
    			->type($user->email,'email')
    			->type('123456','password')
    			->type('123456','password_confirmation')
    			->type($user->name,'name')
    			->type($user->phone,'phone')
    			->type('coding, riding','occupation')
    			->press('Sign Up')
    			->seePageIs('/signup/success');
    }
}
