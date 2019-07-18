<?php

namespace app\index\controller;

use app\common\controller\Redir as MyError;
use app\index\model\UserInfo;
use think\Controller;
use think\Session;

class Userinfom extends Controller
{
    /**
     * @return \think\response\View
     * @throws \think\exception\DbException
     */
    public function userinfom()
    {
        new MyError();
        $user = Session::get('user');
        $res = UserInfo::get($user);
        echo '姓名：'.$res['name'].'<br>'.'性别：'.$res['sex'].'<br>'.'学院：'.$res['institute'].'<br>'.'学校：'.$res['school'].'<br>';
        return view();
    }
}