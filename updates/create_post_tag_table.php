<?php

namespace JeroenvanRensen\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreatePostTagTable extends Migration
{
    public function up()
    {
        Schema::create('jeroenvanrensen_blog_post_tag', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jeroenvanrensen_blog_post_tag');
    }
}
