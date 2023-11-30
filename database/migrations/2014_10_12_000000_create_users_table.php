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

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255)->nullable()->unique();
            $table->string('rank', 255)->nullable();
            $table->string('slug', 255)->nullable()->unique();
            $table->string('lang', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->boolean('status')->nullable();
            $table->timestamp('checked_at')->nullable();

            $table->foreignId('user_created')->nullable()->constrained('users')->onDelete('set null')->cascadeOnUpdate();
            $table->foreignId('user_updated')->nullable()->constrained('users')->onDelete('set null')->cascadeOnUpdate();

            $table->string('last_name', 255)->nullable();
            $table->string('first_name', 255)->nullable();
            $table->string('email', 255)->nullable()->unique();
            $table->string('password', 255)->nullable();
            $table->string('pseudo', 255)->nullable()->unique();
            $table->string('phone', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->json('location')->nullable();
            $table->string('occupation', 255)->nullable();
            $table->string('level', 255)->nullable();
            $table->enum('sex', ["M","F"])->nullable();
            $table->timestamp('birth_at')->nullable();
            $table->string('birth_place', 255)->nullable();
            $table->boolean('marital')->nullable();
            $table->double('child')->nullable();
            $table->longText('bio')->nullable();
            $table->json('other')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('users')->onDelete('set null')->cascadeOnUpdate();
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
        Schema::dropIfExists('users');
    }
};
