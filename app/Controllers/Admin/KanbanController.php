<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class KanbanController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $tickets = model(Ticket::class);

        $db = \Config\Database::connect();
        $total = $db->table('tickets')->countAll();

        $ticketsNoIniciados = $db->table('tickets')->like('status', 's01')->countAllResults();

        $ticketsEnSeguimiento = $db->table('tickets')
            ->like('status', 's02')
            ->orLike('status', 's03')
            ->orLike('status', 's04')
            ->orLike('status', 's06')
            ->orLike('status', 's07')
            ->countAllResults();
        $ticketsCerrados = $db->table('tickets')->like('status', 's05')
            ->orLike('status', 's08')->countAllResults();

        $data = [
            'title' => 'Kanban',
            'totalTickets' => $total,
            'ticketsNoIniciados' => $ticketsNoIniciados,
            'ticketsEnSeguimiento' => $ticketsEnSeguimiento,
            'ticketsCerrados' => $ticketsCerrados,
            'ts01'   => $tickets->where('status', 's01')->orderBy('id', 'desc')->findAll(),
            'ts03'   => $tickets->where('status', 's05')->orWhere('status', 's08')->orderBy('id', 'desc')->findAll(5),
            'ts02'   => $tickets->where('status', 's02')->orWhere('status', 's03')->orWhere('status', 's04')->orWhere('status', 's06')->orWhere('status', 's07')->orderBy('id', 'desc')->findAll(5),
        ];
        return view('kanban/index', $data);
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
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
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
}
