<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use App\Models\Area;

class UsuariosController extends ResourceController
{

    private $userModel;
    private $db;

    public function __construct()
    {
        helper(['url', 'form', 'session']);
        $this->db = db_connect();
        $this->userModel = new UserModel;
        $this->session = \Config\Services::session();
    }


    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $users = model(UserModel::class);


        $db = \Config\Database::connect();

        // $query = mysql_query("SELECT * FROM areas join users on areas.id = users.area");
    
        $data = [
            'title' => 'Usuarios',
            'usuarios'  => $users->findAll(),
            // 'area'  => $query
        ];

        return view('usuarios/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return false;
        // Pendiente
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $areas = model('Area');

        $data = [
            'title' => 'Nuevo registro de usuario',
            'areas' => $areas->findAll()
        ];

        return view('usuarios/create', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        helper(['form']);

        $rules = [
            'name'      => 'required|min_length[3]|max_length[80]',
            'apaterno'  => 'required|min_length[3]|max_length[80]',
            'amaterno'  => 'required|min_length[3]|max_length[80]',
            'email'     => 'required|min_length[6]|max_length[80]|valid_email|is_unique[users.email]',
            'phone_no'  => 'required|min_length[6]|max_length[20]',
            'password'  => 'required|min_length[6]|max_length[200]',
            'role'      => 'required',
            'area'      => 'required'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $areas = model('Area');
            $data = [
                'name'      => $this->request->getPost('name'),
                'apaterno'  => $this->request->getPost('apaterno'),
                'amaterno'  => $this->request->getPost('amaterno'),
                'email'     => $this->request->getPost('email'),
                'phone_no'  => $this->request->getPost('phone_no'),
                'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'      => $this->request->getPost('role'),
                'area'      => $this->request->getPost('area')
            ];
            $userModel->save($data);
            return redirect()->to('admin/usuarios');
        } else {
            $areas = model('Area');
            $data = [
                'validation' => $this->validator,
                'title'      => 'Nuevo registro',
                'areas'     => $areas->findAll()
            ];
            echo view('usuarios/create', $data);
            // return view('usuarios/create', $data);
        }

    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        // $usuario = $this->userModel->find($id);
        $usuario = $this->userModel->where('id', $id)->first();

        if ($usuario) {
            $areas = model('Area');

            $data = [
                'title'     => 'Editar datos',
                'areas'     => $areas->findAll(),
                'usuario'   => $usuario
            ];

            return view('usuarios/edit', $data);
        } else {
            session()->setFlashdata('failed', 'Registro no encontrado');
            return redirect()->to('/admin/usuarios');
        }
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        // helper(['form']);

        $inputs = $this->validate([
            'name'      => 'required|min_length[3]|max_length[80]',
            'apaterno'  => 'required|min_length[3]|max_length[80]',
            'amaterno'  => 'required|min_length[3]|max_length[80]',
            'email'     => 'required|min_length[6]|max_length[80]|valid_email|is_unique[users.email]',
            'phone_no'  => 'required|min_length[6]|max_length[20]',
            // 'password'  => 'required|min_length[6]|max_length[200]',
            'role'      => 'required',
            'area'      => 'required'
        ]);

        if (!$inputs) {
            return view('usuarios/edit', [
                'validation' => $this->validator
            ]);
        }

        $this->usuario->save([
            'name'      => $this->request->getPost('name'),
            'apaterno'  => $this->request->getPost('apaterno'),
            'amaterno'  => $this->request->getPost('amaterno'),
            'email'     => $this->request->getPost('email'),
            'phone_no'  => $this->request->getPost('phone_no'),
            // 'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'      => $this->request->getPost('role'),
            'area'      => $this->request->getPost('area')
        ]);
        session()->setFlashdata('success', 'Registro actualizado');
        return redirect()->to(base_url('/admin/usuarios'));

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
