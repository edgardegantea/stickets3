<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 80],
            'apaterno'      => ['type' => 'varchar', 'constraint' => 80],
            'amaterno'      => ['type' => 'varchar', 'constraint' => 80],
            'email'         => ['type' => 'varchar', 'constraint' => 100],
            'phone_no'      => ['type' => 'varchar', 'constraint' => 20],
            'role'          => ['type' => 'varchar', 'constraint' => 20],
            'password'      => ['type' => 'varchar', 'constraint' => 255],
            'area'          => ['type' => 'int', 'constraint' => 12, 'unsigned' => true, 'auto_increment' => false],
            'created_at'    => ['type' => 'datetime', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => true],
            'deleted_at'    => ['type' => 'datetime', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('area', 'areas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('users', true);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
