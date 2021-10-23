<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Users_M;
use App\Entities\Pengguna_E;

class Users extends BaseController
{
	public function __construct()
    {
        // Memanggil Helper
        helper('form');

        // Load Validasi
        $this->validation = \Config\Services::validation();

	    // Load Session
		$this->session = session();
    }

	public function read()
	{

		$model = new Users_M();

		// $data adalah sebuah array asosiatif
		$data = [
			'judul' => 'Data Pengguna',
			'user' => $model->paginate(3, 'page'),
			'pager' => $model->pager,
		];

		return view("Users/select_user", $data);
	}

	public function create()
	{

		if ($this->request->getPost()) {
            // Jikalau ada data di post
            $data = $this->request->getPost();
            $this->validation->run($data, 'users');
            $errors = $this->validation->getErrors();

            if (!$errors) {

                // Simpan data
                $model = new Users_M();

                $user = new Pengguna_E();

                // Fill untuk assign value data kecuali gambar
                $user->fill($data);
				$user->password = $this->request->getPost('password');
                $user->created_at = date("Y-m-d H:i:s");

                $model->save($user);

                $id_user = $model->insertID();

                $segments = ['admin', 'users'];

                // Akan redirect ke /admin/user/
                return redirect()->to(base_url($segments));
            }

            $this->session->setFlashdata('errors', $errors);
		}

		return view('users/insert_user');
	}

	public function update()
	{
        $id = $this->request->uri->getSegment(4);

        $model = new Users_M();

        $users = $model->find($id);

        $data_users = [
            'users' => $users,
			'judul' => 'Update users'
        ];

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $this->validation->run($data, 'users_update');
            $errors = $this->validation->getErrors();

            if (!$errors) {
                $users = new Pengguna_E();
                $users->id = $id;
                $users->fill($data);

                $users->updated_at = date("Y-m-d H:i:s");

                $model->save($users);

                $segments = ['admin', 'users'];

                return redirect()->to(base_url($segments));
            }
           
        $this->session->setFlashdata('errors', $errors);
        }

		return view("Users/update_user", $data_users);
	}

	public function delete($id = null)
	// Untuk melakukan delete
	{
		$model = new Users_M();
		$model->delete($id);
		return redirect()->to(base_url("/admin/users"));
	}

}
