<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->json('display_name');
            $table->string('locale')->unique();
            $table->string('script');
            $table->string('regional')->nullable();
            $table->timestamps();
        });
    }
}
