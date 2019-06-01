<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * Dusk register test .
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/') //Go to the homepage
                    ->clickLink('Register') //Click the Register link
                    ->assertSee('Register') //Make sure the phrase in the arguement is on the page
            //Fill the form with these values
                    ->value('#name', 'Joe') 
                    ->value('#email', 'joe@example.com')
                    ->value('#password', 'test123')
                    ->value('#password-confirm', 'test123')
                    ->click('button[type="submit"]') //Click the submit button on the page
                    ->assertPathIs('/'); //Make sure you are in the home page
                    
        });
    }
}
