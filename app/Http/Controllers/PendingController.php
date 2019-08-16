<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use DB;
use Session;
use App\Model\admin;

class PendingController extends Controller
{
    public function web($id)
    {
        DB::table('web')->where('id',$id)->update([
            'active' => 1,
        ]);
        return redirect()->route('editor.account.profile');
    }
    public function blogs($id)
    {
        DB::table('blogs')->where('id',$id)->update([
            'active' => 1,
        ]);
        return redirect()->route('editor.account.profile');
    }
    public function service($id)
    {
        DB::table('service')->where('id',$id)->update([
            'active' => 1,
        ]);
        return redirect()->route('editor.account.profile');
    }
}
