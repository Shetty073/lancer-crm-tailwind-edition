<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheque_details', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name', 150);
            $table->string('cheque_no', 30);
            $table->foreignId('cheque_status_id')->constrained('cheque_statuses')->onDelete('restrict');
            $table->foreignId('payment_id')->constrained('payments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cheque_details');
    }
}
