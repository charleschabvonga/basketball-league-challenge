<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class PlayerTest extends DuskTestCase
{

    public function testCreatePlayer()
    {
        $admin = \App\User::find(1);
        $player = factory('App\Player')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $player) {
            $browser->loginAs($admin)
                ->visit(route('admin.players.index'))
                ->clickLink('Add new')
                ->select("team_id", $player->team_id)
                ->type("name", $player->name)
                ->type("surname", $player->surname)
                ->type("birth_date", $player->birth_date)
                ->press('Save')
                ->assertRouteIs('admin.players.index')
                ->assertSeeIn("tr:last-child td[field-key='team']", $player->team->name)
                ->assertSeeIn("tr:last-child td[field-key='name']", $player->name)
                ->assertSeeIn("tr:last-child td[field-key='surname']", $player->surname)
                ->assertSeeIn("tr:last-child td[field-key='birth_date']", $player->birth_date)
                ->logout();
        });
    }

    public function testEditPlayer()
    {
        $admin = \App\User::find(1);
        $player = factory('App\Player')->create();
        $player2 = factory('App\Player')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $player, $player2) {
            $browser->loginAs($admin)
                ->visit(route('admin.players.index'))
                ->click('tr[data-entry-id="' . $player->id . '"] .btn-info')
                ->select("team_id", $player2->team_id)
                ->type("name", $player2->name)
                ->type("surname", $player2->surname)
                ->type("birth_date", $player2->birth_date)
                ->press('Update')
                ->assertRouteIs('admin.players.index')
                ->assertSeeIn("tr:last-child td[field-key='team']", $player2->team->name)
                ->assertSeeIn("tr:last-child td[field-key='name']", $player2->name)
                ->assertSeeIn("tr:last-child td[field-key='surname']", $player2->surname)
                ->assertSeeIn("tr:last-child td[field-key='birth_date']", $player2->birth_date)
                ->logout();
        });
    }

    public function testShowPlayer()
    {
        $admin = \App\User::find(1);
        $player = factory('App\Player')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $player) {
            $browser->loginAs($admin)
                ->visit(route('admin.players.index'))
                ->click('tr[data-entry-id="' . $player->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='team']", $player->team->name)
                ->assertSeeIn("td[field-key='name']", $player->name)
                ->assertSeeIn("td[field-key='surname']", $player->surname)
                ->assertSeeIn("td[field-key='birth_date']", $player->birth_date)
                ->logout();
        });
    }

}
