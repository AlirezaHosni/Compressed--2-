<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phoneNumber')->nullable()->after('email');
            $table->string('image')->nullable()->after('email');
            $table->string('firstName')->nullable()->after('name');
            $table->string('lastName')->nullable()->after('name');
            $table->string('nationalCode')->nullable()->after('password');
            $table->string('phone')->nullable()->after('email');
            $table->integer('active')->default(0)->after('password');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phoneNumber','active','image','firstName','lastName','phone','nationalCode']);
        });
    }
}
