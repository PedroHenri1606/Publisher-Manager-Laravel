<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Artesaos\Defender\Defender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        Role::create(['name' => 'publisher']);

        $user = User::create([
            'name' => 'Pedro Henrique',
            'email' => 'pedrohenri1606@gmail.com',
            'password' => bcrypt('pedro123'),
            'status' => 1,
        ]);

        $user->attachRole($roleAdmin);    
    }
}
