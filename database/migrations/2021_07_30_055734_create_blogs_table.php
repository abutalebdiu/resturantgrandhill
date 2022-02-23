<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->integer('category_id')->nullable();
            $table->longtext('description')->nullable();
            $table->longtext('description_ar')->nullable();
            $table->datetime('publish_date')->nullable();
            $table->integer('status')->nullable();
            $table->integer('is_admin')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
