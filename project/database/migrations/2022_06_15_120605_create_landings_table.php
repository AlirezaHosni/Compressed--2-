<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('titleTwo')->nullable();
            $table->dateTime('publishDate')->nullable();
            $table->string('imageAlt')->nullable();
            $table->string('url')->nullable();
            $table->string('source')->nullable();
            $table->string('chart')->nullable();
            $table->string('link')->nullable();
            $table->string('metaKeyWords')->nullable();
            $table->text('metaKeyDescription')->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('tag')->nullable();
            $table->integer('ArticleGroup_id')->unsigned();
            $table->string('imageBackground')->nullable();
            $table->string('imageFile')->nullable();
            $table->text('mainContent')->nullable();
            $table->text('summary')->nullable();
            $table->string('active')->default(0);
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('landings');
    }
}
