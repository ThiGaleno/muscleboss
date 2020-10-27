<?php

use Illuminate\Database\Seeder;
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
            'name' => 'Julião Petruchio',
            'email' => 'juliao@gmail.com',
            'profile' => 'admin',
            'password' => bcrypt('teste123')
        ]);
        User::create([
            'name' => 'Catarina Batista',
            'email' => 'catarina@gmail.com',
            'profile' => 'salesman',
            'password' => bcrypt('teste123')
        ]);
        User::create([
            'name' => 'Maria do Carmo',
            'email' => 'maria@gmail.com',
            'profile' => 'salesman',
            'password' => bcrypt('teste123')
        ]);
        User::create([
            'name' => 'Nazaré Tedesco',
            'email' => 'nazare@gmail.com',
            'profile' => 'salesman',
            'password' => bcrypt('teste123')
        ]);
    }
}
