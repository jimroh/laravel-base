<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration 
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
	    {
			$table->increments('id');
	        $table->string('username', 25)->unique();
	        $table->string('email', 100)->unique();
	        $table->string('password', 255);
	        $table->string('remember_token', 255)->nullable();
	        $table->string('first_name', 50)->nullable();
	        $table->string('last_name', 50)->nullable();
	        $table->string('address', 255)->nullable();
	        $table->string('city', 100)->nullable();
	        $table->integer('state_id')->unsigned()->index();
	        $table->string('post_code', 30)->nullable();
	        $table->integer('role_id')->unsigned()->index();
	        $table->string('landing_page', 255)->default('/dashboard');
	        // Laravel awesomely handles time zones. 
	        // Store actual PHP time zone instead of relational ID.
	        $table->string('time_zone', 50)->default('America/New_York')->index();
	        $table->boolean('active')->index()->defaul(1);

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
		Schema::dropIfExists('users');
	}
}
