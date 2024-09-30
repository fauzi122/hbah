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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->text('home_address');
            $table->text('business_address');
            $table->string('business_contribution')->nullable();
            $table->string('business_type');
            $table->string('skills');
            $table->string('business_location');
            $table->decimal('business_capital', 20, 2);
            $table->string('production_capability');
            $table->text('business_activity_documentation')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
