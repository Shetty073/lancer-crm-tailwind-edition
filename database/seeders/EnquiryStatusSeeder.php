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
                'status' => 'Oppurtunity',
            )
        );

        DB::table('enquiry_statuses')->insert(
            array(
                'status' => 'Suspect',
            )
        );

        DB::table('enquiry_statuses')->insert(
            array(
                'status' => 'Cold',
            )
        );

        DB::table('enquiry_statuses')->insert(
            array(
                'status' => 'Lost',
            )
        );

        DB::table('enquiry_statuses')->insert(
            array(
                'status' => 'Closed',
            )
        );
    }
}
