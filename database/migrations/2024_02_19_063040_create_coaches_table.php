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
            $table->bigIncrements('id');
            $table->string('coach_code',40)->unique();
            $table->string('name', 100);
            $table->string('name', 100);
            $table->string('coach_slug', 100);
            $table->string('image')->nullable();           
            $table->morphs('filterable');
            $table->string('coach_type')->nullable();                  
            $table->boolean('gender')->default(0);
            $table->string('website', 30);
            $table->string('email', 30)->nullable();            
            $table->string('phone', 20)->nullable();
            $table->string('address', 50)->nullable();
            $table->string('age')->nullable();
            $table->string('degree')->nullable();            
            $table->mediumText('text')->nullable();
            $table->bigInteger('user_id')->unique();
            $table->boolean('uploadby')->default(0);
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
