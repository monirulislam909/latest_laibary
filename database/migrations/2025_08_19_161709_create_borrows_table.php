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
        Schema::create('borrows', function (Blueprint $table) {

            $table->id();
            $table->foreignId("student_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId("book_id")->constrained('books', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->string("return_date");
            $table->string("status")->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
