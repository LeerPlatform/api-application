<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitSectionTable extends Migration
{
    public function up(): void
    {
        Schema::create('unit_section', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->timestamps();
        });
    }
}
