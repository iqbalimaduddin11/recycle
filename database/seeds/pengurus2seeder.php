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
            'name' => 'pengurus2',
            'email' => 'pengurus2@gmail.com',
            'password' => Hash::make('pengurus2'),
            'alamat' => 'kantor',
            'role' => '3',
        ]);
    }
}
