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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, 'user_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('api_token')->unique();
            $table->string('timezone')->nullable();
            $table->boolean('enabled')->nullable();
            $table->boolean('detect_region')->nullable();
            $table->boolean('calltracking')->nullable();
            $table->unsignedInteger('leads_today');
            $table->unsignedInteger('leads_total');
            $table->timestamps();

            // Индексация
            $table->index([
                'user_id',
                'leads_today',
                'leads_total'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
