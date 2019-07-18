<?php

namespace app\index\controller;

use think\Controller;
use app\common\controller\Redir as MyError;

class Personal extends Controller
{
    public function personal()
    {
        new MyError();
        return view();
    }
}