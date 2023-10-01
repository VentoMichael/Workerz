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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->text('about')->nullable();
            $table->json('logoUpload')->nullable();
            $table->json('backgroundUpload')->nullable();
            $table->string('jobTitle')->nullable();
            $table->unsignedBigInteger('mainSkill')->nullable();
            $table->foreign('mainSkill')->references('id')->on('skills')->onDelete('cascade');
            $table->string('employees')->nullable();
            $table->string('website')->nullable();
            $table->boolean('hiring')->default(false);
            $table->boolean('allow_commenting')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
