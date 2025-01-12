<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('title')
                ->unique();
            $table->text('description');
            $table->date('release_date');
            $table->string('poster_url');
            $table->string('age_rating');
            $table->bigInteger('ticket_price');
            $table->integer('duration_minutes')->nullable(); 
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
