<?php

namespace app\index\controller;

use think\Controller;
use app\common\controller\Redir as MyError;

class Fixinfo extends Controller
{
    /**
     * @return \think\response\View
     */
    public function fix()
    {
        new MyError();
        return view();
    }
}