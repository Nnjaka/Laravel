<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddSourceTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/sources/create')
                ->type('name', 'Some name')
                ->type('url', 'http://franecki.com/')
                ->press('Сохранить')
                ->assertPathIs('/admin/sources');
        });
    }

    public function testFail()
    {
        $this->browse((function (Browser $browser) {
            $browser->visit('/admin/sources/create')
                ->type('name', '')
                ->type('url', 'http://franecki.com/')
                ->press('Сохранить')
                ->assertSee('Поле имя обязательно для заполнения.')
                ->assertPathIs('/admin/sources/create');
        }));
    }
}
