<?php

namespace Tests\Browser;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', 'Some title')
                ->type('author', 'Author')
                ->type('description', 'Some description')
                ->press('Сохранить')
                ->assertPathIs('/admin/news');
        });
    }

    public function testFail()
    {
        $this->browse((function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', '')
                ->type('author', 'Author')
                ->type('description', 'Some description')
                ->press('Сохранить')
                ->assertSee('Поле наименование обязательно для заполнения.')
                ->assertPathIs('/admin/news/create');
        }));
    }
}
