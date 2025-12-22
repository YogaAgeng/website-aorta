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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('skills')->nullable();
            $table->text('interests')->nullable();
            $table->string('occupation')->nullable();
            $table->text('experience')->nullable();
            $table->enum('availability', ['weekdays', 'weekends', 'both'])->default('both');
            $table->boolean('has_vehicle')->default(false);
            $table->boolean('has_license')->default(false);
            $table->text('emergency_contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
