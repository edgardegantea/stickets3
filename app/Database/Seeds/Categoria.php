<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Categoria extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name'              => 'Acádémico',
                'slug'              => 'académico',
                'description'       => 'Académico',
                'updated_at'        => date('Y-m-d H:i:s'),
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'name'              => 'Personal',
                'slug'              => 'personal',
                'description'       => 'Personal',
                'updated_at'        => date('Y-m-d H:i:s'),
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'name'              => 'Website',
                'slug'              => 'website',
                'description'       => 'Website',
                'updated_at'        => date('Y-m-d H:i:s'),
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'name'              => 'Residencia profesional',
                'slug'              => 'residencia-profesional',
                'description'       => 'Residencia profesional',
                'updated_at'        => date('Y-m-d H:i:s'),
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'name'              => 'Capacitación',
                'slug'              => 'capacitación',
                'description'       => 'Capacitación',
                'updated_at'        => date('Y-m-d H:i:s'),
                'created_at'        => date('Y-m-d H:i:s')
            ],
            [
                'name'              => 'Comisión',
                'slug'              => 'comisión',
                'description'       => 'Comisión',
                'updated_at'        => date('Y-m-d H:i:s'),
                'created_at'        => date('Y-m-d H:i:s')
            ],
        ];

        $builder = $this->db->table('categories');
        $builder->insertBatch($categories);
    }
}
