<?php

namespace app\index\controller;

use think\Controller;
use think\Session;

class Logout extends Controller
{
    public function logout()
    {
        Session::delete('user');
        return $this->redirect('\..\index\Index\index');
    }
}