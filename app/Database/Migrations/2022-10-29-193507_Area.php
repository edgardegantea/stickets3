<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Area extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 12, 'unsigned' => true, 'auto_increment' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 150],
            'description'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'phone'         => ['type' => 'varchar', 'constraint' => 20, 'null' => true],
            'email'         => ['type' => 'varchar', 'constraint' => 80, 'null' => true],
            'active'        => ['type' => 'boolean', 'default' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('areas', true);
    }

    public function down()
    {
        $this->forge->dropTable('areas', true);
    }
}