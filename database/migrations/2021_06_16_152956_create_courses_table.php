<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('course_code');
            $table->string('description');
            $table->string('regular_price');
            $table->string('discount_price');
            $table->string('course_outline');
            $table->string('course_outline_content');
            $table->string('who_is_it_for');
            $table->string('what_you_will_learn');
            $table->string('what_it_prepare_you_for');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->string('online_self_palced');
            $table->string('course_time_need');
            $table->string('hands_on_lab_assignment');
            $table->string('video_content');
            $table->string('course_timelimit_after_enroll');
            $table->string('digital_badge');
            $table->string('discussion_forum');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
