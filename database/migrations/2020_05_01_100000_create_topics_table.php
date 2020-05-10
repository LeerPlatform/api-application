<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->json('display_name')->nullable();
            $table->json('description')->nullable();
            // $table->string('status')->default('draft');
            $table->bigInteger('unique_views_count')->default(0);
            $table->timestamps();
        });
    }
}
