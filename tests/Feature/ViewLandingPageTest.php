<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewLandingPageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     * @return void
     */
    public function landing_page_loads_correctly()
    {
        $response = $this->get('/home');

        $response->assertStatus(200);
        $response->assertSee('OUR STORY');
        $response->assertSee('FEEDBACK');
    }

    // /**
    //  * @test
    //  */
    // public function featured_category_is_visible(){

    // } 
}
