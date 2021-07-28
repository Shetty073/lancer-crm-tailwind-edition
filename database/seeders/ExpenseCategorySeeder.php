<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expense_categories')->insert(
            array(
                'name' => 'IT Cost',
                'remark' => 'IT development + maintenance costs',
            )
        );

        DB::table('expense_categories')->insert(
            array(
                'name' => 'Marketing Cost',
                'remark' => 'Ad campaigning costs',
            )
        );

        DB::table('expense_categories')->insert(
            array(
                'name' => 'Travelling/Logistics',
                'remark' => 'Travelling or logistics costs',
            )
        );

    }
}
