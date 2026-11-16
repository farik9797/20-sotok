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
        Schema::create('leads', function (Blueprint $table) {
            // заявки квиза — те же поля, что у «Заявок» в WordPress
            $table->id();
            $table->string('direction', 200)->default('');
            $table->string('area', 40)->default('');
            $table->string('style', 200)->default('');
            $table->string('systems', 400)->default('');
            $table->string('messenger', 20)->default('');
            $table->string('phone', 40);
            $table->string('page', 500)->default('');
            $table->string('delivery', 300)->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
