<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cities')->nullable()->before('created_at');
            $table->boolean('gender')->nullable()->default(1)->before('cities');
            $table->integer('age')->nullable()->before('gender');
            $table->string('linkedin')->nullable()->before('age');
            $table->string('company')->nullable()->before('linkedin');

            $table->date('preferred')->nullable()->after('linkedin');



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
            //
        });
    }
}
