<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        User::create([
            'username' => 'Administrator',
            'email' => 'admin@gallery.com',
            'password' => Hash::make('admin'),
            'role_id' => 1
        ]);

    }
}
