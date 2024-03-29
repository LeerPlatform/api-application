<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseEnrolledTable extends Migration
{
    public function up(): void
    {
        Schema::create('course_enrolled', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
        });
    }
}
