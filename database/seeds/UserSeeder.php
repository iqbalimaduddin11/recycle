<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'pengurus1',
                'email' => 'pengurus1@gmail.com',
                'password' => bcrypt('pengurus1'),
                'alamat' => 'kantor',
                'nomer' => '081211001102',
                'avatar' => 'https://via.placeholder.com/150',
                'role' => '2',    
            ],

            [
                'name' => 'pengurus2',
                'email' => 'pengurus2@gmail.com',
                'password' => bcrypt('pengurus2'),
                'alamat' => 'kantor',
                'nomer' => '081211001103',
                'avatar' => 'https://via.placeholder.com/150',
                'role' => '3',
            ],

            [
                'name' => 'bendahara',
                'email' => 'bendahara@gmail.com',
                'password' => bcrypt('bendahara'),
                'alamat' => 'kantor',
                'nomer' => '081211001104',
                'avatar' => 'https://via.placeholder.com/150',
                'role' => '4',
            ],

            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'alamat' => 'kantor',
                'nomer' => '081211001105',
                'avatar' => 'https://via.placeholder.com/150',
                'role' => '5',

            ],
        ]);
    }
}
