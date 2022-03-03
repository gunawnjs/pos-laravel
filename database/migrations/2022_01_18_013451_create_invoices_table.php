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
            $table->string('total_amount');
            $table->string('amount_tendered');
            $table->string('bank_account_number');
            $table->string('date_recorded');
            $table->string('bank_account_name');
            $table->string('payment_type');
            $table->timestamps();

        });

        // Table relasi invoices -> invoices x customers
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreignId('customer_id')->after('id')->constrained('customers')->cascadeOnDelete();
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
