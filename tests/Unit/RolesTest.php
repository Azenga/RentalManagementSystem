<?php

namespace Tests\Unit;

use App\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RolesTest extends TestCase
{

    use RefreshDatabase;
   
    /** @test */
    public function a_role_can_be_created()
    {
        Role::create($this->data());

        $this->assertCount(1, Role::all());

    }


    private function data()
    {
        return ['title' => 'test'];
    }
}
