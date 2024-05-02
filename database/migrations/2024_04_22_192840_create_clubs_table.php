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
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('street_number')->nullable();
            $table->string('street_name')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->string('number');
            $table->string('email');
            $table->foreignId('representative_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('totalMembers')->nullable();
            $table->string('balance')
                ->default(1000);
            $table->integer('discount')
                ->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};