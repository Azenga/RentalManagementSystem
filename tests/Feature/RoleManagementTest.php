<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleManagementTest extends TestCase
{

    use RefreshDatabase;

    
    /** @test */
    public function a_regular_user_can_not_view_roles()
    {
        $this->be($user = factory(User::class)->create());
        
        $this->get('/roles')
            ->assertStatus(403);
    }

    /** @test */
    public function admin_can_view_roles()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $user->roles()->attach(Role::create(['title' => 'super-admin']));

        $this->be($user);
        
        $this->get('/roles')
            ->assertStatus(200);        
    }
}
