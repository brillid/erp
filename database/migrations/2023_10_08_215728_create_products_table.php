<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('itemcode')->unique();
            $table->string('barcode')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('sku')->nullable();
            $table->decimal('purchase_price', 10, 2);
            $table->decimal('wholesale_price', 10, 2);
            $table->decimal('retail_price', 10, 2);
            $table->string('serial_number')->nullable();
            $table->string('unit_of_measure')->nullable();
            $table->string('tax_tariff')->nullable();
            $table->string('product_group')->nullable();
            $table->string('brand')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('material')->default(false);
            $table->boolean('service')->default(false);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
