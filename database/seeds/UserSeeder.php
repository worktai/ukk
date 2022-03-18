<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Role',
            'email' => 'admin@role.test',
            'password' => bcrypt('admin')
        ]);

        $admin->assignRole('admin');

        $manejer = User::create([
            'name' => 'Manejer Role',
            'email' => 'manejer@role.test',
            'password' => bcrypt('manejer')
        ]);

        $manejer->assignRole('manejer');

        $kasir = User::create([
            'name' => 'Kasir Role',
            'email' => 'kasir@role.test',
            'password' => bcrypt('kasir')
        ]);

        $kasir->assignRole('kasir');
    }
}
