<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prioridad extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id'            => ['type' => 'varchar', 'constraint' => 11, 'auto_increment' => false],
            'name'          => ['type' => 'varchar', 'constraint' => 50],
            'slug'          => ['type' => 'varchar', 'constraint' => 50],
            'created_at'    => ['type' => 'datetime', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => true],
            'deleted_at'    => ['type' => 'datetime', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('priorities', true);
    }

    public function down()
    {
        $this->forge->dropTable('priorities', true);
    }
}
