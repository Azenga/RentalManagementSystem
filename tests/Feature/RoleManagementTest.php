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
        $user = factory(User::class)->create();

        $user->roles()->attach(Role::create(['title' => 'super-admin']));

        $this->be($user);
        
        $this->get('/roles')
            ->assertStatus(200);        
    }

    /**
     * @test
     */
    public function a_title_is_required()
    {
        //$this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $user->roles()->attach(Role::create(['title' => 'super-admin']));

        $this->be($user);

        $this->post('/roles', ['title' => ''])
            ->assertSessionHasErrors('title');

        $this->assertCount(1, Role::all());
    }

    /** 
     * @test
     */
    public function a_title_must_be_unique()
    {
        $user = factory(User::class)->create();

        $user->roles()->attach(Role::create(['title' => 'super-admin']));

        $this->be($user);

        $this->post('/roles', ['title' => 'super-admin'])
            ->assertSessionHasErrors('title');

        $this->assertCount(1, Role::all());        
    }

    /**
     * @test
     */
    public function admin_can_create_a_role()
    {

        $user = factory(User::class)->create();

        $user->roles()->attach(Role::create(['title' => 'super-admin']));

        $this->be($user);

        $this->post('/roles', ['title' => 'admin'])
            ->assertRedirect('/roles');

        $this->assertCount(2, Role::all());   

        $this->assertEquals('admin', Role::findOrFail(2)->title);
    }
}
