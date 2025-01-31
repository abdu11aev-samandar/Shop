<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            $table->string('status');
            $table->string('coupon')->nullable();

            $table->unsignedBigInteger('total')->nullable();
            $table->unsignedBigInteger('reduction')->nullable();

            $table->foreignId('user_id')->index()->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
