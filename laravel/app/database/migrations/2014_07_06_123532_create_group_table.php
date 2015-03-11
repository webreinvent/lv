<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('groups', function($t)
        {

        	$t->increments('id');
        	$t->string('name');
        	$t->string('slug');
        	$t->boolean('active')->default(1);
        	$t->timestamps();
        	$t->softDeletes();

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
		Schema::drop('groups');
	}

}