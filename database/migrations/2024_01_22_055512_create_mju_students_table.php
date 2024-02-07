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
        Schema::create('mju_students', function (Blueprint $table) {
            $table->string('student_code',15)->primary();
            $table->string('first_name',50)->nullable(0);
            $table->string('last_name',50)->nullable(0);
            $table->string('first_name_en',50)->nullable(0);
            $table->string('last_name_en',50)->nullable(0);
            $table->unsignedInteger('major_id')->nullable(0);
            $table->string('idcard',20)->nullable(0);
            $table->date('birthdate')->nullable(0);
            $table->string('gender',1);
            $table->string('address',500);
            $table->string('phone',50);
            $table->string('email',50);
            $table->timestamps($precision = 0);
            $table->foreign('major_id')->references('major_id')->on('majors')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mju_students');
    }
};
