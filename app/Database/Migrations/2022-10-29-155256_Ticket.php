<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ticket extends Migration
{
    
    public function up() {
    
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 12, 'unsigned' => true, 'auto_increment' => true],
            // 'area'          => ['type' => 'int', 'constraint' => 12, 'unsigned' => true],
            'usuario'       => ['type' => 'int', 'constraint' => 11, 'auto_increment' => false, 'unsigned' => true],
            'category'      => ['type' => 'int', 'constraint' => 12, 'unsigned' => true],
            'priority'      => ['type' => 'varchar', 'constraint' => 5],
            'title'         => ['type' => 'varchar', 'constraint' => 150],
            'slug'          => ['type' => 'varchar', 'constraint' => 150],
            'description'   => ['type' => 'text'],
            // 'evidence'      => ['type' => 'int', 'constraint' => 12, 'unsigned' => true],
            'evidence'      => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'url'           => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status'        => ['type' => 'varchar', 'constraint' => 5, 'null' => true],
            'phone'         => ['type' => 'varchar', 'constraint' => 15],
            'email'         => ['type' => 'varchar', 'constraint' => 80],
            'remote'        => ['type' => 'varchar', 'constraint' => 50, 'null' => true],
            'dateMeeting'   => ['type' => 'datetime', 'null' => true],
            'hourMeeting'   => ['type' => 'time', 'null' => true],
            'ok'            => ['type' => 'boolean', 'null' => true],
            'created_at'    => ['type' => 'datetime', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => true],
            'deleted_at'    => ['type' => 'datetime', 'null' => true]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('usuario', 'users', 'id');
        $this->forge->addForeignKey('category', 'categories', 'id');
        $this->forge->addForeignKey('priority', 'priorities', 'id');
        $this->forge->addForeignKey('status', 'status', 'id');
        // $this->forge->addForeignKey('area', 'areas', 'id');
        // $this->forge->addForeignKey('evidence', 'evidences', 'id');
        $this->forge->createTable('tickets', true);

        $this->db->enableForeignKeyChecks();
    }


    public function down()
    {
        $this->forge->dropTable('tickets', true);
    }
}
