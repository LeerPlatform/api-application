<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterSectionTable extends Migration
{
    public function up()
    {
        Schema::create('unit_section', function (Blueprint $table) {
            $table->id();
            $table->integer('chapter_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->timestamps();
        });
    }
}
