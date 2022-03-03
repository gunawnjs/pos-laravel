<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('qty');
            $table->string('sub_total');
            $table->string('order_data');
            $table->string('unit_price');
            $table->timestamps();
        });

        // Table relasi purchase_orders -> purchase_orders x suppliers 
        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->foreignId('supplier_id')->after('id')->constrained('suppliers')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
}
