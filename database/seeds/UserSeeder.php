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
            [
                'company_id' => 1,
                'name' => 'Super Admin',
                'email' => 'super-admin@user.user',
                'password' => Hash::make('AAAaaa111'),
                'role' => 1
            ],
            [
                'company_id' => 1,
                'name' => 'Support',
                'email' => 'support@user.user',
                'password' => Hash::make('AAAaaa111'),
                'role' => 2
            ],
            [
                'company_id' => 1,
                'name' => 'Accounting',
                'email' => 'accounting@user.user',
                'password' => Hash::make('AAAaaa111'),
                'role' => 3
            ]
        ]);
    }
}
