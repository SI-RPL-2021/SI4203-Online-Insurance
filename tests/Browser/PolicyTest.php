<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PolicyTest extends DuskTestCase
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
                ->visitRoute('dashboard.policies.detail', ['id' => 0])
                ->type('name', 'Polis Test')
                ->type('desc', 'This is some desc')
                ->type('tags', 'Health Insurance')
                ->select('kategori', 'kesehatan')
                ->type('premium', 100000)
                ->attach('img', __DIR__ . '/uploads/bgang')
                ->press('Submit');
        });
    }
}
