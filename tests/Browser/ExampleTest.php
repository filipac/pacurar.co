<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Pacurar');
            $browser->script('window.scrollTo(0,document.body.scrollHeight+150);');
            $browser->waitFor('#submitForm')
                    ->click('#submitForm')
                    ->assertSee('The message field is required.');
        });
    }
}
