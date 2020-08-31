<?php

namespace JeroenvanRensen\Blog\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use Schema;

class CreateTagsTable extends Migration
{
    public function up()
    {
        Schema::create('jeroenvanrensen_blog_tags', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jeroenvanrensen_blog_tags');
    }
}
