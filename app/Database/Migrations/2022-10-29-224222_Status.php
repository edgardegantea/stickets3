<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Status extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'varchar', 'constraint' => 5],
            'name'          => ['type' => 'varchar', 'constraint' => 20, 'unique' => true],
            'created_at'    => ['type' => 'datetime', 'null' => false],
            'updated_at'    => ['type' => 'datetime', 'null' => true]
        ]);

        $this->forge->addKey('id', false);
        $this->forge->createTable('status', true);
    }

    public function down()
    {
        $this->forge->dropTable('status', true);
    }
}
