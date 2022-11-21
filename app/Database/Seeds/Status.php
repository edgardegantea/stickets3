<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Status extends Seeder
{
    public function run()
    {
        $status = [
            [
                'id'            => 's01',
                'name'          => 'No iniciado',
                'updated_at'    => date('Y-m-d H:i:s'),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 's02',
                'name'          => 'Iniciado',
                'updated_at'    => date('Y-m-d H:i:s'),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 's03',
                'name'          => 'En revisión',
                'updated_at'    => date('Y-m-d H:i:s'),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 's04',
                'name'          => 'En proceso',
                'updated_at'    => date('Y-m-d H:i:s'),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 's05',
                'name'          => 'Finalizado',
                'updated_at'    => date('Y-m-d H:i:s'),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 's06',
                'name'          => 'Abierto',
                'updated_at'    => date('Y-m-d H:i:s'),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 's07',
                'name'          => 'Re-abierto',
                'updated_at'    => date('Y-m-d H:i:s'),
                'created_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 's08',
                'name'          => 'Cerrado',
                'updated_at'    => date('Y-m-d H:i:s'),
                'created_at'    => date('Y-m-d H:i:s')
            ]
        ];

        $builder = $this->db->table('status');
        $builder->insertBatch($status);
    }
}
