<?php

namespace App\Controllers\Usuario;

use App\Controllers\BaseController;

class UsuarioController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "usuario") {
            echo 'Acceso no autorizado';
            exit;
        }
    }
    public function index()
    {
        return view("usuario/dashboard");
    }

    public function perfil() {
        return view("usuario/perfil");
    }
}
