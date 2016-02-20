<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestEventMail extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEvent()
    {
        $this->expectsEvents(App\Event\UserRegistered::class);
    }
}
