<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard()
    {
        $adminUser = User::factory()->create([
            'role' => UserRole::Admin,
        ]);
        $response = $this->actingAs($adminUser)->getJson('/api/dashboard/admin');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'data' => [
                'total_orders',
                'statistics',
            ],
        ]);
    }

    public function test_user_dashboard()
    {
        $user = User::factory()->create([
            'role' => UserRole::User,
        ]);
        $response = $this->actingAs($user)->getJson("/api/dashboard/user/{$user->id}");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'data',
        ]);
    }
}
