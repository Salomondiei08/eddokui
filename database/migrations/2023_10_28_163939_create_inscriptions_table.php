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
        Schema::disableForeignKeyConstraints();

        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255)->nullable()->unique();
            $table->string('rank', 255)->nullable();
            $table->string('slug', 255)->nullable()->unique();
            $table->string('lang', 255)->nullable();

            $table->foreignId('user_created')->nullable()->constrained('users')->onDelete('set null')->cascadeOnUpdate();
            $table->foreignId('user_updated')->nullable()->constrained('users')->onDelete('set null')->cascadeOnUpdate();
            $table->foreignId('classe_id')->nullable()->constrained('classes')->onDelete('set null')->cascadeOnUpdate();
            $table->foreignId('student_id')->nullable()->constrained('students')->onDelete('set null')->cascadeOnUpdate();


            $table->string('content', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
