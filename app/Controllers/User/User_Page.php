<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Users_M;

class User_Page extends BaseController
{

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        return view('template/main');
    }
    public function masuk()
    {
        return view('template/dashboard/dashboard_user');
    }
    public function profile()
    {
        // Dapatkan Id dari segmen
        $id =  session()->get('id');

        $model = new Users_M();

        $user = $model->find($id);

        // Data yang akan dikirim ke view specific
        $data = [
            "user" => $user
        ];

        return view('Users/User_Profile/view_profile_user', $data);
    }
}
