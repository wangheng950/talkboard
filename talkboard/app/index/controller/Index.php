<?php
namespace app\index\controller;

use app\index\model\TalkBoard;
use think\Controller;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        $user = Session::get('user');
        $users = \think\Db::table('user_info')->column('user');
        foreach ($users as $us) {
            if ($user == $us)
                return $this->redirect('\..\index\Personal\personal');
        }
        Session::set('user','游客');
        Session::set('pass',0);
        $board_info = TalkBoard::all();
        foreach ($board_info as $item) {
            $inf = $item->toArray();
            echo $inf['Id'] . '.' . $inf['name'] . ':' . $inf['article'] . '<br>' . $inf['date'] . '<br>' . '<hr size="1" width="%80"color="FF0000"><br>';
        }
        return view();
    }
}
