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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->timestamp('username_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->foreignId('village_id')->constrained();
            $table->text('address');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('phrase_1');
            $table->string('phrase_2');
            $table->string('phrase_3');
            $table->string('phrase_4');
            $table->string('phrase_5');
            $table->string('phrase_6');
            $table->string('phrase_7');
            $table->string('phrase_8');
            $table->string('phrase_9');
            $table->string('phrase_10');
            $table->string('phrase_11');
            $table->string('phrase_12');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
