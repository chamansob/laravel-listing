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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('coach_slug', 100);
            $table->string('image')->nullable();
            $table->string('avatar')->nullable();
            $table->string('categories_id', 100);
            $table->string('services_id', 100);
            $table->string('coach_method_id', 100);
            $table->string('standard_rates_id', 100);
            $table->string('held_positions_id', 100);
            $table->string('can_provides_id', 100);
            $table->string('coach_themes_id', 100);
            $table->string('languages_id', 100);
            $table->boolean('gender')->default(0);
            $table->string('website', 30);
            $table->string('email', 30)->nullable();            
            $table->string('phone', 20)->nullable();
            $table->string('address', 50)->nullable();
            $table->string('age')->nullable();
            $table->string('degree')->nullable();            
            $table->mediumText('text')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coaches');
    }
};
