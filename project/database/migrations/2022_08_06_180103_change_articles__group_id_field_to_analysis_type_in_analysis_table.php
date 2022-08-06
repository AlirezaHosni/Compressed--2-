<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeArticleGroupIdFieldToAnalysisTypeInAnalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('analysis', function (Blueprint $table) {
            $table->dropColumn('analysis_type');
            $table->integer('analysis_type_id')->unsigned()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('analysis', function (Blueprint $table) {
            //
        });
    }
}
