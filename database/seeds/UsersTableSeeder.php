<?php

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

        factory(\App\Models\User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '123456',
            'active' => true
        ]);

        factory(\App\Models\User::class, 5)->create();
    }
}
