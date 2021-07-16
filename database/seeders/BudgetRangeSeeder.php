<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BudgetRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('budget_ranges')->insert(
            array(
                'range' => '20L - 30L',
            )
        );

        DB::table('budget_ranges')->insert(
            array(
                'range' => '30L - 40L',
            )
        );

        DB::table('budget_ranges')->insert(
            array(
                'range' => '40L - 50L',
            )
        );

        DB::table('budget_ranges')->insert(
            array(
                'range' => '50L - 60L',
            )
        );

        DB::table('budget_ranges')->insert(
            array(
                'range' => '60L - 70L',
            )
        );

        DB::table('budget_ranges')->insert(
            array(
                'range' => '70L - 80L',
            )
        );

        DB::table('budget_ranges')->insert(
            array(
                'range' => '80L - 90L',
            )
        );

        DB::table('budget_ranges')->insert(
            array(
                'range' => '90L - 1Cr',
            )
        );

        DB::table('budget_ranges')->insert(
            array(
                'range' => '1Cr - 1.2Cr',
            )
        );

        DB::table('budget_ranges')->insert(
            array(
                'range' => '1.2Cr - 1.5Cr',
            )
        );

        DB::table('budget_ranges')->insert(
            array(
                'range' => '1.5Cr and above',
            )
        );
    }
}
