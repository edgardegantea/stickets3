<?php

namespace App\Controllers\Usuario;

use CodeIgniter\RESTful\ResourceController;

use App\Models\Ticket;
use App\Models\Area;
use App\Models\Status;
use App\Models\Prioridad;
use App\Models\Categoria;


class Solicitante extends ResourceController
{
    

    private $ticket;

    public function __construct()
    {
        helper(['url', 'form', 'session']);
        $db = db_connect();
        $this->db = db_connect();
        $pager = \Config\Services::pager();
        $this->ticket = new Ticket;
        $this->session = \Config\Services::session();
    }


    public function index()
    {
        return view('solicitudTicket/index');
    }


    public function new()
    {
        $categories = model('Categoria');
        $priorities = model('Prioridad');
        $status = model('Status');
        $areas = model('Area');

        $data = [
            'title'         => 'Nuevo ticket de soporte',
            'status'        => $status->findAll(),
            'priorities'    => $priorities->findAll(),
            'categories'    => $categories->findAll(),
            'areas'         => $areas->findAll()
        ];
        return view('solicitudTicket/create', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $inputs = $this->validate([
            'area' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'title' => 'required|min_length[5]|max_length[150]',
            'description' => 'required|min_length[5]',
            'status'    => 'required',
            'phone'     => 'required',
            'email'     => 'required'
        ]);

        if (!$inputs) {
            return view('solicitudTicket/create', ['validation' => $this->validator]);
        }

        $this->ticket->save([
            'area'          => $this->request->getPost('area'),
            'category'      => $this->request->getPost('category'),
            'priority'      => $this->request->getPost('priority'),
            'title'         => $this->request->getPost('title'),
            'slug'          => url_title($this->request->getPost('title'), '-', true),
            'description'   => $this->request->getPost('description'),
            'evidence'      => $this->request->getPost('evidence'),
            'url'           => $this->request->getPost('url'),
            'status'        => $this->request->getPost('status'),
            'phone'         => $this->request->getPost('phone'),
            'email'         => $this->request->getPost('email')
        ]);

        session()->setFlashdata('success', 'Comprobante enviado con éxito');

        return redirect()->to(site_url('/solicitud/ticketEnviado'));
    }






    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }


    public function ticketEnviado()
    {
        return view('solicitudTicket/ticketEnviado');
    }
}
