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
                'status' => 'Hot',
            )
        );

        DB::table('enquiry_statuses')->insert(
            array(
                'status' => 'Mild',
            )
        );

        DB::table('enquiry_statuses')->insert(
            array(
                'status' => 'Cold',
            )
        );

        DB::table('enquiry_statuses')->insert(
            array(
                'status' => 'Client',
            )
        );
    }
}
