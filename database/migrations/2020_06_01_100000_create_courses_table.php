<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->integer('topic_id')->unsigned();

            $table->string('slug')->unique();

            // Content
            $table->json('title')->nullable();
            $table->json('headline')->nullable();
            $table->json('description')->nullable();
            $table->json('description_excerpt')->nullable();
            $table->json('learning_points')->nullable();
            // $table->json('target_audience')->nullable();

            // Meta
            $table->string('level')->nullable();
            // $table->string('status')->nullable()->default('draft');
            $table->integer('estimated_duration')->nullable();
            $table->date('published_at')->nullable();

            $table->integer('language_id')->unsigned()->nullable();

            $table->bigInteger('unique_views_count')->default(0);

            $table->timestamps();
        });

        // $table->foreign('topic_id')
        //     ->references('id')->on('topics')
        //     ->onDelete('cascade');
    }
}
