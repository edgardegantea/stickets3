<?php

namespace App\Controllers\Admin;

use App\Models\Ticket;
use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "admin") {
            echo 'Acceso no autorizado';
            exit;
        }
    }
    

    public function index()
    {
        return view("admin/dashboard");
    }


    public function perfil() {
        $tickets = model('Ticket');

        $totalTickets = $tickets->countAllResults();

        return view("admin/perfil", compact('totalTickets'));
    }
}
 