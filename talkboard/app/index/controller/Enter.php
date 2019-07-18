<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\UserInfo;
use think\Session;

class Enter extends Controller
{
    public function enter()
    {
        $user = $_POST['user'];
        $pass = md5($_POST['pass']);
        $cr = 0;
        $user_info = UserInfo::all();
        foreach ($user_info as $item) {
            $info = $item->toArray();
            if($info['user'] == $user)
            {
                if($info['pass'] == $pass)
                {
                    Session::set('user',$user);
                    Session::set('pass',$pass);
                    return $this->redirect('\..\index\Personal\personal');
                }
                else
                {
                    echo '密码错误！';
                    return $this->redirect('\..\index\Login\login');
                }
                $cr = 1;
            }
        }
        if(!$cr)
        {
            echo '用户名不存在';
            return $this->redirect('\..\index\Login\login');
        }
    }
}