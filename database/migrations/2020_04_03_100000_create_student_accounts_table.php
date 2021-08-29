<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAccountsTable extends Migration
{
    public function up(): void
    {
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_accounts');
    }
}
