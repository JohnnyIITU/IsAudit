<?php

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
        $user = new \App\User();
        $user->name = 'TEST USER';
        $user->email = 'admin@isaudit.kz';
        $user->password = \Illuminate\Support\Facades\Hash::make('12345678');
        $user->role = 'root';
        $user->company_id = '0';
        $user->save();
        // $this->call(UsersTableSeeder::class);
    }
}
