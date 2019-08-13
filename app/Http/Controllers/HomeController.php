<?php

namespace App\Http\Controllers;

use App\Web;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $webs = Web::where([
            'active' => Web::STATUS_PUBLIC
        ])->limit(18)->get();

        $viewData = [
            'webs' => $webs,
        ];
        return view('index',$viewData);
    }
}
