<?php

use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credentials = [
            'email'    => 'admin@gallery.com',
            'password' => 'admin',
            'username' => 'Administrator',
        ];
        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleByName('Administrator');
        $role->users()->attach($user);
    }
}
