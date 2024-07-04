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
        Schema::create('repositories', function (Blueprint $table) {
            $table->id();
            $table->string('github_id')->unique();
            $table->string('name');
            $table->string('full_name');
            $table->string('description')->nullable();
            $table->string('url');
            $table->integer('open_issues_count');
            $table->integer('stargazers_count');
            $table->integer('pull_requests_count');
            $table->dateTime('last_updated_at');

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repositories');
    }
};
