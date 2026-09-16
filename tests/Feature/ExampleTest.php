<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Test that the landing page renders successfully with Inertia and configuration.
     */
    public function test_landing_page_renders_with_inertia_and_config(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertInertia(fn (Assert $page) => $page
            ->component('LandingPage')
            ->has('laundry.brand_name')
            ->has('laundry.whatsapp_admin_number')
            ->has('laundry.layanan')
            ->where('laundry.brand_name', 'LaundryQu')
        );
    }
}
