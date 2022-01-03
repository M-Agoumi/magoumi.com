<?php

use Simfa\Framework\Db\Migration;
use Simfa\Framework\Db\Migration\Schema;

class mg0005_create_newsletter_table extends Migration
{

	function up()
	{
		Migration::create('newsletter', function (Schema $table) {
			$table->id();
			$table->string('email');
			$table->string('token');
			$table->smallInt('status');
			$table->timestamps();

			return $table;
		});
	}

	function down()
	{
		Migration::drop('newsletter');
	}
}
