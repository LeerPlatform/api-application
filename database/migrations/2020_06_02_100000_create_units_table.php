<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->string('slug');
            $table->string('title');
            $table->text('description')->nullable();
            $table->boolean('draft')->default(true);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }
}
