<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SubscriptionTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visitRoute('subscription', ['id' => '1'])
                ->radio('gender', 'L')
                ->type('fullName', 'GHF')
                ->type('birthdate', '04/24/1999')
                ->type('phone', '088177552')
                ->type('address', 'Bandung')
                ->press('Submit');
        });
    }
}
