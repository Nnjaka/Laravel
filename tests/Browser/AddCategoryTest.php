<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddCategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('title', 'Some title')
                ->type('description', 'Some description')
                ->press('Сохранить')
                ->assertPathIs('/admin/categories');
        });
    }

    public function testFail()
    {
        $this->browse((function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('title', '')
                ->type('description', 'Some description')
                ->press('Сохранить')
                ->assertSee('Поле наименование обязательно для заполнения.')
                ->assertPathIs('/admin/categories/create');
        }));
    }
}
