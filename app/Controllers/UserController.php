<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Correo electrónico o contraseña incorrecta",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                $this->setUserSession($user);

                if($user['role'] == "admin"){

                    return redirect()->to(base_url('admin'));

                }elseif($user['role'] == "usuario"){

                    return redirect()->to(base_url('usuario'));
                }
            }
        }
        return view('login');
    }
    

    private function setUserSession($user)
    {
        $data = [
            'id'            => $user['id'],
            'name'          => $user['name'],
            'apaterno'      => $user['apaterno'],
            'amaterno'      => $user['amaterno'],
            'phone_no'      => $user['phone_no'],
            'email'         => $user['email'],
            'isLoggedIn'    => true,
            "role"          => $user['role'],
            "area"          => $user['area']
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

}
