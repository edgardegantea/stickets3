<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user_object = new UserModel();

        $user_object->insertBatch([
            [
                "name"          => "Edgar",
                "apaterno"      => "Degante",
                "amaterno"      => "Aguilar",
                "email"         => "edgar@mail.com",
                "phone_no"      => "2311234567",
                "password"      => password_hash("12345678", PASSWORD_DEFAULT),
                "role"          => "admin",
                "area"          => 1,
                "created_at"    => "2022-10-30 10:00:00"
            ],
            [
                "name"          => "Ana",
                "apaterno"      => "López",
                "amaterno"      => "Hernández",
                "email"         => "usuario2@mail.com",
                "phone_no"      => "2311234566",
                "password"      => password_hash("12345678", PASSWORD_DEFAULT),
                "role"          => "usuario",
                "area"          => 2,
                "created_at"    => "2022-10-30 10:00:05"
            ]
        ]);
    }
}
