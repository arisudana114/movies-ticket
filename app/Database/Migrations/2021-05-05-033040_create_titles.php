<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTitles extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
				'auto_increment' => true
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => '128'
			],
			'description' => [
				'type' => 'VARCHAR',
				'constraint' => '128'
			],
			'price' => [
				'type' => 'INT',
				'constraint' => '10',
				'unsigned' => true
			],
			'image' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'unsigned' => true
			]
		]);

		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('titles');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('titles');
	}
}
