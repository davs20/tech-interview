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
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('assign_to')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('column_task_id')->references('id')->on('task_columns');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
