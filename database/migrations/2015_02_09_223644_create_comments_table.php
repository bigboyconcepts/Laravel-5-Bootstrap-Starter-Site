<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
            $table->increments('id')->unsigned();
            $table->text('content');
            $table->integer('post_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('post_id')
                ->references('id')->on('posts');
            $table->foreign('user_id')
                ->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
