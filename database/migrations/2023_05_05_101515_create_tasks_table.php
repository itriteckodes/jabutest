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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('task_type');
            $table->string('days_of_week')->nullable();
            $table->string('date_of_month')->nullable();
            $table->string('month_of_year')->nullable();
            $table->text('description')->nullable();
            $table->date('iteration_start_date')->nullable();
            $table->date('iteration_end_date')->nullable();
            $table->integer('iteration_count')->nullable();
            $table->foreignId('task_group_id')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
