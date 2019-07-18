<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\UserInfo;

class Reg extends Controller
{
    public function reg()
    {
        $user_name = $_POST['user'];
        $password = $_POST['pass'];
        $user_info = UserInfo::all();
        foreach ($user_info as $item) {
            $info = $item->toArray();
            if($info['user'] == $user_name)
            {
                echo '用户名已存在';
                return $this->redirect('\..\index\Register\register','3');
            }
        }
        $res = UserInfo::create([
            'user' => $user_name,
            'pass' => md5($password)
        ]);
        if($res){
            return $this->success('创建成功！','\..\index\Login\login');
        }
        else {
            echo '用户创建失败！';
            return $this->redirect('\..\index\Register\register');
        }
    }
}