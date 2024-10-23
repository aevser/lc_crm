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
        Schema::create('lead_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\Project\Project::class, 'project_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Project\Lead\Lead::class, 'lead_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('name');
            $table->string('type');
            $table->string('color');
            $table->timestamps();

            // Индексация
            $table->index([
                'project_id',
                'lead_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_classes');
    }
};
