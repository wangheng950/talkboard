<?php

namespace app\common\controller;

use think\Controller;
use think\Db;
use think\Session;

class Redir extends Controller
{
    /**
     * Index constructor.
     * 判断session是否合法
     */
    public function __construct()
    {
        $user = Session::get('user');
        $pass = Session::get('pass');
        $uot = 0;
        // echo $user.$pass;
        $names = Db::table('user_info')->column('pass','user');
        foreach ($names as $us  =>  $pa) {
            // echo $us.'=>'.$pa;
            if($user == $us and $pass == $pa)
                $uot = 1;
        }
        if($uot == 0)
            return $this->redirect('index\Index\index');
    }
}