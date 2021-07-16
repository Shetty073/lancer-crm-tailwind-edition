<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert(
            array(
                'name' => '1 BHK',
            )
        );

        DB::table('configurations')->insert(
            array(
                'name' => '2 BHK',
            )
        );

        DB::table('configurations')->insert(
            array(
                'name' => '3 BHK',
            )
        );

        DB::table('configurations')->insert(
            array(
                'name' => '4 BHK',
            )
        );

        DB::table('configurations')->insert(
            array(
                'name' => 'Plot',
            )
        );

        DB::table('configurations')->insert(
            array(
                'name' => 'Commercial',
            )
        );

        DB::table('configurations')->insert(
            array(
                'name' => 'Other',
            )
        );
    }
}
