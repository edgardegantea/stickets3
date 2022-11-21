<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Area extends Seeder
{
    public function run()
    {
        $areas = [
            [
                'name'          => 'Subdirección Académica',
                'description'   => 'Subdirección Académica',
                'phone'         => '2313114000',
                'email'         => 'sub.acad@teziutlan.tecnm.mx',
                'active'        => true
            ],
            [
                'name'          => 'Posgrado',
                'description'   => 'Posgrado',
                'phone'         => '2313114000',
                'email'         => 'posgrado@teziutlan.tecnm.mx',
                'active'        => true
            ],
            [
                'name'          => 'Recursos financieros',
                'description'   => 'Recursos financieros',
                'phone'         => '2313114000',
                'email'         => 'rec.fin@teziutlan.tecnm.mx',
                'active'        => true
            ],
            [
                'name'          => 'División de Ingeniería Informática',
                'description'   => 'División de Ingeniería Informática',
                'phone'         => '2313114000',
                'email'         => 'dev.inf@teziutlan.tecnm.mx',
                'active'        => true
            ]

        ];

        $builder = $this->db->table('areas');
        $builder->insertBatch($areas);
    }
}
