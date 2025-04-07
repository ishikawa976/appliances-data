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
        Schema::create('appliances', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id');
            $table->string('item_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->integer('manufacture_year')->nullable();
            $table->foreignId('maker_id')->nullable();
            $table->string('maker_url')->nullable();
            $table->date('purchase_date')->nullable();
            $table->foreignId('shop_id')->nullable();;
            $table->boolean('disposal');
            $table->date('disposal_date')->nullable();
            $table->string('manual_pdf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appliances');
    }
};
