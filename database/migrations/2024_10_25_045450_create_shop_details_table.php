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
        Schema::create('shop_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('subscriber_id');
            $table->string('shoplogo')->default(NULL);
            $table->string('name');
            $table->string('phone');
            $table->string('websitelink')->nullable();
           // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->string('pincode');
            $table->string('state');
            $table->string('city');
            $table->string('buildingnumber')->nullable();
            $table->string('arearoadname')->nullable();
            $table->string('nearbylandmark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_details');
    }
};
