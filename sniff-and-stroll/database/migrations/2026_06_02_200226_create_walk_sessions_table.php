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
        Schema::create('walk_sessions', function (Blueprint $table) {

            $table->id();

            $table->foreignId('owner_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('walker_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('dog_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->dateTime('scheduled_at');

            $table->integer('duration_minutes');

            $table->enum('status', [
                'pending',
                'accepted',
                'active',
                'completed',
                'cancelled'
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('walk_sessions');
    }
};
