<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_modes')->insert(
            array(
                'name' => 'Credit/Debit swipe',
                'is_digital' => true,
            )
        );

        DB::table('payment_modes')->insert(
            array(
                'name' => 'Cheque',
                'is_cheque' => true,
            )
        );

        DB::table('payment_modes')->insert(
            array(
                'name' => 'Cash',
                'is_cash' => true,
            )
        );

        DB::table('payment_modes')->insert(
            array(
                'name' => 'Bank transfer',
            )
        );

        DB::table('payment_modes')->insert(
            array(
                'name' => 'Other',
            )
        );
    }
}
