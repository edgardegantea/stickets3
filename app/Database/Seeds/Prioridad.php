<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Prioridad extends Seeder
{
    public function run()
    {

        $faker = Factory::create();

        $priorities = [
            [
                'id'            => 'pr1',
                'name'          => 'Urgente',
                'slug'          => 'urgente',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 'pr2',
                'name'          => 'Alta',
                'slug'          => 'alta',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 'pr3',
                'name'          => 'Media',
                'slug'          => 'media',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 'pr4',
                'name'          => 'Baja',
                'slug'          => 'baja',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ],
            [
                'id'            => 'pr5',
                'name'          => 'No prioritario',
                'slug'          => 'no-prioritario',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ]

        ];

        $builder = $this->db->table('priorities');
        $builder->insertBatch($priorities);

    }
}
