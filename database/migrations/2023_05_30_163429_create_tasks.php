<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 155);
            $table->text('description');
            $table->date('assign_date');
            $table->date('deadline');
            $table->enum('priority', ['Urgent', 'High', 'Normal', 'Low']);
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('assign_to');
            $table->unsignedBigInteger('column_task_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
