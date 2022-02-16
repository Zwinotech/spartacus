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
            $table->renameColumn('name', 'firstname');
        });

        Schema::table('users', function(Blueprint $table)
        {
            $table->string('lastname')->after('firstname');
//            $table->string('id_number',100)->after('lastname');
//            $table->integer('role_id')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
