<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnquiryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert the default statuses
        DB::table('enquiry_statuses')->insert(
            array(
                'status' => 'hot',
            )
        );

        DB::table('enquiry_statuses')->insert(
            array(
                'status' => 'cold',
            )
        );

        DB::table('enquiry_statuses')->insert(
            array(
                'status' => 'lost',
            )
        );

        DB::table('enquiry_statuses')->insert(
            array(
                'status' => 'member',
            )
        );
    }
}
