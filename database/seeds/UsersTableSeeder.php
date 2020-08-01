<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
                    'email' => 'azenga.kevin7@gmail.com', 
                    'name' => 'Azenga Kevin'
                ]);

        $user->roles()->attach(Role::where('title', 'super-admin')->pluck('id'));
    }
}
