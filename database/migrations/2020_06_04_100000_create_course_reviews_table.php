<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('course_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('rating', 9, 2);
            $table->integer('course_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
    }
}
