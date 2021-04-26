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
    public function testWrongPassword()
    {
        $this->browse(function (Browser $browser) {
            $wrongEmail = 'hello@gmail.com';
            $wrongPassword = '283823828';
            $browser->visit('/login')
                ->type('email', $wrongEmail)
                ->type('password', $wrongPassword)
                ->press('Login')
                ->assertSeeAnythingIn('.alert-danger');
        });
    }
    public function testAuth()
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
                ->press('Register')
                ->assertPathIs('/login')
                ->type('email', $email)
                ->type('password', $password)
                ->press('Login')
                ->visit('/profile')
                ->assertSee($name)
                ->assertSee($email);
        });
    }
}
