<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analysis', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('titleTwo')->nullable();
            $table->dateTime('publishDate')->nullable();
            $table->string('imageAlt')->nullable();
            $table->string('url')->nullable();
            $table->string('metaDescription')->nullable();
            $table->string('metaKeyWords')->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('tag')->nullable();
            $table->integer('article_Group_id')->unsigned();
            $table->string('image')->nullable();
            $table->text('mainContent')->nullable();
            $table->text('summary')->nullable();
            $table->integer('active')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('analysis');
    }
}
