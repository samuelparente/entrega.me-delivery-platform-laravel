<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('brand')->nullable();
            $table->string('model_number')->nullable();
            $table->string('upc')->unique()->nullable();
            $table->string('sku')->unique()->nullable();
            $table->integer('stock')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('shipping', 10, 2)->nullable();
            $table->decimal('weight', 10, 2)->nullable(); 
            $table->string('color')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('material')->nullable();
            $table->text('warranty')->nullable();
            $table->text('features')->nullable();
            $table->text('image')->nullable();
            $table->boolean('active')->default(true);
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
