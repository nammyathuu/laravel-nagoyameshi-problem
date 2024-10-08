<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_guest_cannot_access_index(): void
    {
        
        $user = User::factory()->create();

        $response = $this->get(route('admin.users.index'));

        $response->assertRedirect(route('admin.login'));
    }

    public function test_user_cannot_access_index(){
        $user = User::factory()->create();

        $response=$this->actingAs($user)->get(route('admin.users.index'));

        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_access_index(){
        $admin = new Admin();
        $admin->email = 'admin@example.com';
        $admin->password = Hash::make('nagoyameshi');
        $admin->save();

        $response=$this->actingAs($admin, 'admin')->get(route('admin.users.index'));

        $response->assertStatus('200');
    }

    public function test_guest_cannot_access_show(): void
    {
        
        $user = User::factory()->create();

        $response = $this->get(route('admin.users.show', $user));

        $response->assertRedirect(route('admin.login'));
    }

    public function test_user_cannot_access_show(){
        $user = User::factory()->create();

        $response=$this->actingAs($user)->get(route('admin.users.show', $user));

        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_access_show(){
        $admin = new Admin();
        $admin->email = 'admin@example.com';
        $admin->password = Hash::make('nagoyameshi');
        $admin->save();

        $user = User::factory()->create();

        $response=$this->actingAs($admin, 'admin')->get(route('admin.users.show', $user));

        $response->assertStatus('200');
    }
}
