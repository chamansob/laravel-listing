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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();           
            $table->string('name')->nullable();
            $table->string('heading',100);
            $table->string('small',500)->nullable();
            $table->text('text')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(0);            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
