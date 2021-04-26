<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @group auth
     * @return void
     */

    public function login()
    {
        $this->browse(function (Browser $browser) {
            $email = "ghufronfr@gmail.com";
            $password = "12345678";
            $browser->visit('/login')
                ->type('email', $email)
                ->type('password', $password)
                ->press('Login');
            $browser->visit('/profile');
        });
    }


    /**
     * A Dusk test example.
     *
     * @group auth
     * @return void
     */
    public function register()
    {

        $this->browse(function (Browser $browser) {
            $fullName = "Ghufron";
            $email = "ghufronfr@gmail.com";
            $password = "12345678";
            $browser->visit('/register')
                ->type('fullName', $fullName)
                ->type('email', $email)
                ->type('password', $password)
                ->press('Login')
                ->assertPathIs('/login');
            // ->assertSee();
        });
    }
}
