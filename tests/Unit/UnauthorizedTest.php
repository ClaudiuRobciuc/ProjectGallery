<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\PaintingModel;

class UnauthorizedTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    
    public function testCreateStorePainting()
    {
        $response = $this->get(route('admin.user.index'));
        $response->assertRedirect(route('admin.login'));

        $response = $this->get(route('admin.user.create'));
        $response->assertRedirect(route('admin.login'));

        $response = $this->get(route('admin.painting.create'));
        $response->assertRedirect(route('admin.login'));

        $response = $this->get(route('admin.index'));
        $response->assertRedirect(route('admin.login'));
        
    }
}
