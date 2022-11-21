<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Ticket extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $tickets = [];

        for ($i=0; $i < 20; $i++) {
            $created_at = $faker->dateTime();
            $updated_at = $faker->dateTimeBetween($created_at);
            $deleted_at = $faker->dateTimeBetween($updated_at);

            $tickets[] = [
                // 'area'          => $faker->numberBetween(1, 4),
                'usuario'       => $faker->numberBetween(1,2),
                'category'      => $faker->numberBetween(1, 6),
                'priority'      => $faker->randomElement(['pr1', 'pr2', 'pr3', 'pr4', 'pr5']),
                'title'         => $faker->sentence(),
                'slug'          => $faker->sentence(),
                'description'   => $faker->text(),
                'evidence'      => $faker->mimeType(),
                'url'           => $faker->url(),
                'status'        => $faker->randomElement(['s01', 's02', 's03', 's04', 's05', 's06', 's07', 's08']),
                'phone'         => $faker->tollFreePhoneNumber(),
                'email'         => $faker->email(),
                'remote'        => $faker->boolean(),
                'dateMeeting'   => $faker->date(),
                'hourMeeting'   => $faker->time(),
                'ok'            => $faker->boolean(),
                'created_at'    => $created_at->format('Y-m-d H:i:s'),
                'updated_at'    => $updated_at->format('Y-m-d H:i:s'),
                'deleted_at'    => $deleted_at->format('Y-m-d H:i:s')
            ];
        }

        $builder = $this->db->table('tickets');
        $builder->insertBatch($tickets);
    }
}
