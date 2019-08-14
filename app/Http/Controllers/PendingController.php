<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use DB;
use Session;
use App\Model\admin;

class PendingController extends Controller
{
    public function index()
    {
        $array = array(
            'webs' => array(
                'web'=>DB::table('web')->where('active',1)->get(),
            ),
            'blogs' => array(
                'blog'=>DB::table('blogs')->where('active',1)->get(),
            ),
            'services' => array(
                'service'=>DB::table('service')->where('active',1)->get(),
            )
        );

        return view('admins.page.account.pending',$array);
    }
}
