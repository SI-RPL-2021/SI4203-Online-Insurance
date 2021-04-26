<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ClaimTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $rand = time();
            $name = $rand;
            $email = $rand . "@gmail.com";
            $password = "12345678";

            $browser->visit('/register')
                ->type('name', $name)
                ->type('email', $email)
                ->type('password', $password)
                ->press('Register');
            $browser->visit('/login')
                ->type('email', $email)
                ->type('password', $password)
                ->press('Login');
        });
    }
}
