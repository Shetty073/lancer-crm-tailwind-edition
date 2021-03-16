<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->double('total_amount', 12, 2);
            $table->double('amount_paid', 12, 2);
            $table->boolean('is_fully_paid')->default(0);
            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('cascade');
            $table->foreignId('tax_id')->nullable()->constrained('taxes')->onDelete('cascade');
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
        Schema::dropIfExists('invoices');
    }
}
