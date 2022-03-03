<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('unit_in_stock');
            $table->string('discount_percentage');
            $table->string('unit_price');
            $table->string('reorder_level');
            $table->timestamps();
        });

        // Table relasi sales -> sales x products
        Schema::table('sales', function (Blueprint $table) {
            $table->foreignId('product_id')->after('id')->constrained('products')->cascadeOnDelete();
        });

        // Table relasi products -> products x users
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('user_id')->after('id')->constrained('users')->cascadeOnDelete();
        });    

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);
        });
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn(['product_id']);
        });
        Schema::dropIfExists('products');
    }
}
