<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('qty');
            $table->string('unit_price');
            $table->string('sub_total');
            $table->timestamps();
        });

        // Table relasi sales -> sales x invoices
        Schema::table('sales', function (Blueprint $table) {
            $table->foreignId('invoice_id')->after('id')->constrained('invoices')->cascadeOnDelete();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
