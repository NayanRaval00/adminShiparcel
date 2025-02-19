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
        Schema::create('user_courier_weight_slabs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('courier_company_id')->constrained('courier_companies')->onDelete('cascade');
            $table->json('courier_weight_slab_id')->nullable();
            $table->boolean('is_enabled')->default(1); // 1 for enabled, 0 for disabled
            $table->timestamps();

            $table->unique(['user_id', 'courier_company_id', 'courier_weight_slab_id'], 'user_company_slab_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_courier_weight_slabs');
    }
};
