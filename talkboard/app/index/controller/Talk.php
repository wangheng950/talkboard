<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\TalkBoard;
use think\Session;

class Talk extends Controller
{
    public function talk()
    {
        $user = Session::get('user');
        $talk = $_POST['talk'];
        $res = TalkBoard::create([
            'name'  =>  $user,
            'article'   =>  $talk,
        ]);
        if(!$res)
        {
            echo '留言失败';
            if($user == '游客') {
                return $this->redirect('\..\index\Index\index');
            }else
                return $this->redirect('\..\index\Talkboard\talk');
        }
        // return $res;
        if($user == '游客') {
            return $this->success('留言成功', '\..\index\Index\index');
        }else
            return $this->success('留言成功','\..\index\Talkbo\talkbo');
         // return "<form action = '\..\Index\index'><input type='submit' value='返回'></form>";
    }
}