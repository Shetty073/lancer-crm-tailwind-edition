<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChequeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert the default statuses
        DB::table('cheque_statuses')->insert(
            array(
                'status' => 'Received',
            )
        );

        DB::table('cheque_statuses')->insert(
            array(
                'status' => 'Desposited',
            )
        );

        DB::table('cheque_statuses')->insert(
            array(
                'status' => 'Cleared',
            )
        );

        DB::table('cheque_statuses')->insert(
            array(
                'status' => 'Bounced',
            )
        );
    }
}
