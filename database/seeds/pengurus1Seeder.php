<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'name' => 'pengurus1',
            'email' => 'pengurus1@gmail.com',
            'password' => Hash::make('pengurus1'),
            'alamat' => 'kantor',
            'role' => '2',
        ]);
    }
}
