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
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->integer('number');
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('assigned_user_id')->nullable();
            $table->unsignedBigInteger('priority_id')->nullable();
            $table->unsignedBigInteger('version_id')->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('project');
            $table->foreign('assigned_user_id')->references('id')->on('users');
            $table->foreign('priority_id')->references('id')->on('priority');
            $table->foreign('version_id')->references('id')->on('version');

            $table->index(['number', 'project_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};
