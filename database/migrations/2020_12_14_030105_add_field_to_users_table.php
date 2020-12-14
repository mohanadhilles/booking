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
            $table->boolean('answer_1')->nullable()->before('company');
            $table->boolean('answer_2')->nullable()->before('answer_2');
        
            $table->date('preferred')->nullable()->before('answer_2');



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
