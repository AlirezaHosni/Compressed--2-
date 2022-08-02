<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateArticlesTable extends Migration
{

    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('shortNews')->default(0);
            $table->string('titleTwo')->nullable();
            $table->dateTime('publishDate')->nullable();
            $table->string('imageAlt')->nullable();
            $table->string('url')->nullable();
            $table->string('source')->nullable();
            $table->string('metaDescription')->nullable();
            $table->string('metaKeyWords')->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('tag')->nullable();
            $table->integer('article_Group_id')->unsigned();
            $table->string('image')->nullable();
            $table->text('mainContent')->nullable();
            $table->text('summary')->nullable();
            $table->integer('active')->default(0);
            $table->softDeletes('deleted_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
