<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->integer('parent_id')->unsigned();
            $table->integer('shortNews')->default(0);
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
        Schema::dropIfExists('article_groups');
    }
}
