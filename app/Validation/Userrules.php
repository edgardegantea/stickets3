<?php

namespace App\Validation;
use App\Models\UserModel;

class Userrules
{
    public function validateUser(string $str, string $fields, array $data)
    {
        $model = new UserModel();
        $user = $model->where('email', $data['email'])
            ->first();

        if (!$user) {
            return false;
            // echo 'El usuario no existe';
        }

        return password_verify($data['password'], $user['password']);
    }
}
