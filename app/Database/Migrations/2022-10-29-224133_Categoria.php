<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categoria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 12, 'unsigned' => true, 'auto_increment' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 150, 'unique' => true],
            'slug'          => ['type' => 'varchar', 'constraint' => 150],
            'description'   => ['type' => 'text', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => false],
            'created_at'    => ['type' => 'datetime', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('categories', true);
    }

    public function down()
    {
        $this->forge->dropTable('categories', true);
    }
}
