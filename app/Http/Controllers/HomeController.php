<?php

namespace App\Http\Controllers;

use App\CateWeb;
use App\Partner;
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
        ]);

        $catewebs = CateWeb::where([
            'active' => CateWeb::STATUS_PUBLIC
        ])->limit(8)->get();

        $partners = Partner::select('logo')->where('active',CateWeb::STATUS_PUBLIC)->limit(12)->get();

        $viewData = [
            'webs' => $webs->paginate(18),
            'catewebs' => $catewebs,
            'partners' => $partners,
        ];
        return view('index',$viewData);
    }


}
