<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class GameTest extends DuskTestCase
{

    public function testCreateGame()
    {
        $admin = \App\User::find(1);
        $game = factory('App\Game')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $game) {
            $browser->loginAs($admin)
                ->visit(route('admin.games.index'))
                ->clickLink('Add new')
                ->select("team1_id", $game->team1_id)
                ->select("team2_id", $game->team2_id)
                ->type("start_time", $game->start_time)
                ->type("result1", $game->result1)
                ->type("result2", $game->result2)
                ->press('Save')
                ->assertRouteIs('admin.games.index')
                ->assertSeeIn("tr:last-child td[field-key='team1']", $game->team1->name)
                ->assertSeeIn("tr:last-child td[field-key='team2']", $game->team2->name)
                ->assertSeeIn("tr:last-child td[field-key='start_time']", $game->start_time)
                ->assertSeeIn("tr:last-child td[field-key='result1']", $game->result1)
                ->assertSeeIn("tr:last-child td[field-key='result2']", $game->result2)
                ->logout();
        });
    }

    public function testEditGame()
    {
        $admin = \App\User::find(1);
        $game = factory('App\Game')->create();
        $game2 = factory('App\Game')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $game, $game2) {
            $browser->loginAs($admin)
                ->visit(route('admin.games.index'))
                ->click('tr[data-entry-id="' . $game->id . '"] .btn-info')
                ->select("team1_id", $game2->team1_id)
                ->select("team2_id", $game2->team2_id)
                ->type("start_time", $game2->start_time)
                ->type("result1", $game2->result1)
                ->type("result2", $game2->result2)
                ->press('Update')
                ->assertRouteIs('admin.games.index')
                ->assertSeeIn("tr:last-child td[field-key='team1']", $game2->team1->name)
                ->assertSeeIn("tr:last-child td[field-key='team2']", $game2->team2->name)
                ->assertSeeIn("tr:last-child td[field-key='start_time']", $game2->start_time)
                ->assertSeeIn("tr:last-child td[field-key='result1']", $game2->result1)
                ->assertSeeIn("tr:last-child td[field-key='result2']", $game2->result2)
                ->logout();
        });
    }

    public function testShowGame()
    {
        $admin = \App\User::find(1);
        $game = factory('App\Game')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $game) {
            $browser->loginAs($admin)
                ->visit(route('admin.games.index'))
                ->click('tr[data-entry-id="' . $game->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='team1']", $game->team1->name)
                ->assertSeeIn("td[field-key='team2']", $game->team2->name)
                ->assertSeeIn("td[field-key='start_time']", $game->start_time)
                ->assertSeeIn("td[field-key='result1']", $game->result1)
                ->assertSeeIn("td[field-key='result2']", $game->result2)
                ->logout();
        });
    }

}
