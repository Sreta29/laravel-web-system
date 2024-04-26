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
        Schema::create('configuration_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code', 10)->nullable();
            $table->string('description', 100)->nullable();
            $table->string('category', 30)->nullable();
            $table->bigInteger('parent_id')->default(0);
            $table->boolean('if_active')->default(true);
            $table->boolean('soft_delete')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuration_codes');
    }
};
