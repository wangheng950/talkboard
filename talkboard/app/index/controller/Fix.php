<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\UserInfo;
use think\Session;
use app\common\controller\Redir as MyError;

class Fix extends Controller
{
    public function fix()
    {
        new MyError();
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $institute = $_POST['institute'];
        $school = $_POST['school'];
        $user = Session::get('user');

        $res = UserInfo::update([
            'name'  =>  $name,
            'sex'   =>  $sex,
            'institute' =>  $institute,
            'school'    =>  $school
        ],[
            'user'  =>  $user
        ]);
        if($res)
        {
            return $this->success('更新成功！','\..\index\Userinfom\userinfom');
        }else
        {
            echo '信息更新失败！';
            return $this->redirect('\..\index\Userinfom\userinfom');
        }
    }
}