<?php

namespace App\Http\Controllers;

use App\CateWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $cateweb = CateWeb::all();
        View::Share('cateweb',$cateweb);
    }

    public function khogiaodien()
    {
        return view('pages.khogiaodien');
    }
}
