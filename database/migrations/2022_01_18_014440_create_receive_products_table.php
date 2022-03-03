<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiveProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receive_products', function (Blueprint $table) {
            $table->id();
            $table->string('qty');
            $table->string('unit_price');
            $table->string('sub_total');
            $table->string('received_date');
            $table->timestamps();
        });

        // Table relasi receive_products -> receive_products x products
        Schema::table('receive_products', function (Blueprint $table) {
            $table->foreignId('product_id')->after('id')->constrained('products')->cascadeOnDelete();
        });

        // Table relasi receive_products -> sales x product 
        Schema::table('receive_products', function (Blueprint $table) {
            $table->foreignId('user_id')->after('id')->constrained('users')->cascadeOnDelete();
        });

        // Table relasi receive_products -> receive_products x suppliers 
        Schema::table('receive_products', function (Blueprint $table) {
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
        Schema::dropIfExists('receive_products');
    }
}
