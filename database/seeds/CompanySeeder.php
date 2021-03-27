<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'proshyan company',
            "phone_one" => "(702) 793-2221",
            "phone_two" => null,
            'mc_number' => 1111
        ]);
    }
}
