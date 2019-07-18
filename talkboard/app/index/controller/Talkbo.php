<?php

namespace app\index\controller;

use app\index\model\TalkBoard;
use think\Controller;
use app\common\controller\Redir as MyError;

class Talkbo extends Controller
{
    /**
     * @throws \think\exception\DbException
     */

    public function talkbo()
    {
        new MyError();
        $board_info = TalkBoard::all();
        foreach ($board_info as $item) {
            $inf = $item->toArray();
            echo $inf['Id'] . '.' . $inf['name'] . ':' . $inf['article'] . '<br>' . $inf['date'] . '<br>' . '<hr size="1" width="%80"color="FF0000"><br>';
        }
        return view();
    }
}