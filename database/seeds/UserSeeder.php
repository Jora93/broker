<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'company_id' => 1,
            'name' => 'John Doe',
            'email' => 'user@user.user',
            'password' => Hash::make('AAAaaa111'),
            'role' => 1
        ]);
    }
}
