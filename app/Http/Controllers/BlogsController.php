<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Auth;




class BlogsController extends Controller
{
    public function list()
    {
        $data['blogs'] = DB::table('blogs')->get();
        return view('admins.page.blogs.index_blog',$data);
    }
    public function edit($id)
    {
        $data['blogs']=DB::table('blogs')->find($id);
        $data['blogs'] = DB::table('blogs')->find($id);
        $tags = DB::table('blog_tags')->where('blogs_id', $id)->pluck('name');
        $array = [];
        foreach ($tags as $value) {
            array_push($array, $value);
        }
        $data['str_tags'] = implode(";", $array);

        if(Gate::allows('edit',DB::table('blogs')->find($id))){
            return view('admins/page/blogs/edit_blogs',$data);
        }
        else{
            return view('admins.page.account.error');
        }
    }

    public function update(Request $request,$id)
    {
       
        $this->validate($request,
        [
            'name'=>'required',
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



        DB::table('blogs')->where('id',$id)->update([
            'name'=>$request->name,
            'summary' => $request->summary,
            'detail' => $request->detail,
            'active' =>$active,

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
    public function create()
    {
        return view('admins.page.blogs.add_blogs');
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:3',
            'contentt' => 'required',
            'summary' => 'required',
            'tags' => 'required',
//            'image' => 'required',

        ], [
            'name.required' => 'Tên không được xác định',
            'name.min' => 'Tên không được ít hơn 3 kí tự',
            'summary' => 'Tóm tắt chưa được xác định',
            'contentt.required' => 'Nội dung không được xác định',
//            'image.required' => 'Ảnh không được xác định',
            'tags.required' => 'Thể loại không được xác định',

        ]);

        DB::table('blogs')->insert([
            'name' => $request->name,

            'summary' => $request->summary,
            'detail' => $request->contentt,
            'admin_id'=>Auth::user()->id,
            'view' => 0,
            'active' => 1,
            'created_at' => now()
        ]);
        $blogs_id = DB::table('blogs')->where('name', $request->name)->orderBy('id', 'desc')->first();

//Tách chuỗi
        $explode = explode(';', $request->tags);

        foreach ($explode as $ex) {
            if ($ex != "") {
                DB::table('blog_tags')->insert([
                    'name' => $ex,
                    'blogs_id' => $blogs_id->id,
                    'searchs' => 0,
                    'created_at'=>now()
                ]);
            }
        }

        return redirect()->back()->with('thongbao', 'Add Success');
    }
    public function destroy($id)
    {
        DB::table('blogs')->where('id','=',$id)->delete();
        return redirect()->route('blogs.list')->with('thongbao','Xóa thành công!');
    }


    public function setactive($id, $status)
    {
        DB::table('blogs')->where('id', '=', $id)->update([
            'active' => $status,
        ]);
        return redirect()->back()->with('thanhcong', 'Thành công');
    }



}
