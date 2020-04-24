<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseUnitTable extends Migration
{
    public function up()
    {
        Schema::create('course_unit', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id')->unsigned()->index();
            $table->integer('unit_id')->unsigned()->index();
            $table->timestamps();
        });
    }
}
