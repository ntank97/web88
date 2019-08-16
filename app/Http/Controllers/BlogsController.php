<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use DB;

class BlogsController extends Controller
{
    public function list()
    {
        # code...
    }
    public function edit($id)
    {
        $blogs=DB::table('blogs')->find($id);
        if(Gate::allows('edit',$blogs)){
            return view('admins/page/blogs/edit_blogs',['blogs'=>$blogs]);
        }
        else{
            return view('admins.page.account.error');
        }
    }

    public function update(Request $request,$id)
    {
       
        $this->validate($request,
        [
            'summary' => 'required|min:3',
            'detail' => 'required',
        ],
        [
            'summary.required' => 'Tên là trường bắt buộc',
            'summary.min' => 'Ít nhất 3 ký tự',
            'detail.required|min:3' => 'Link là trường bắt buộc',
            'detail.min' => 'Ít nhất 3 ký tự',
        ]
        );

        if ($request->active=='null') {
           $active=0;
        }
        else{
            $active=1;
        }

        if ($request->view=='null') {
            $view=0;
         }
         else{
             $view=1;
         }
         dd($active);
        DB::table('blogs')->where('id',$id)->update([
            'summary' => $request->summary,
            'detail' => $request->detail,
            'active' =>$active,
            'view' => $view,
        ]);

        return redirect()->route('blogs.list');
        
    }
    public function delete($id)
    {
        $blogs=DB::table('blogs')->find($id);
        if(Gate::allows('delete',$blogs)){
            DB::table('blogs')->where('id',$id)->delete();
        }
        else{
            return view('admins.page.account.error');
        }
    }
}
