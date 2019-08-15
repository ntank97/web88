<?php

namespace App\Http\Controllers;

use App\CateWeb;
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

        $catewebs = CateWeb::where([
            'active' => CateWeb::STATUS_PUBLIC
        ])->limit(8)->get();

        $viewData = [
            'webs' => $webs,
            'catewebs' => $catewebs,
        ];
        return view('index',$viewData);
    }
}
