<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankAccount::create([
            'name' => 'Default',
            'last_balance' => 0.00,
            'current_balance' => 0.00,
        ]);
    }
}
