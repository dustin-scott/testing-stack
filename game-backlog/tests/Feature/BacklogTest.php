<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BacklogTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_the_login_page()
    {
        $response = $this->get('/backlog');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_users_can_visit_the_backlog()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/backlog');
        $response->assertStatus(200);
    }
}
