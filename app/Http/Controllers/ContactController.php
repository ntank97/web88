<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use DB;

class ContactController extends Controller
{
    public function list()
    {
        $array['contact']=DB::table('contact')->get();

        return view('admins/page/contact/list',$array);
    }

    public function add()
    {
        return view('admins/page/contact/add');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric',
                'email' => 'required|email',
            ],
            [
                'title.required' => "Tên là trường bắt buộc",
                'address.required' => "Tên là trường bắt buộc",
                'phone.required' => "Số điện thoại là trường bắt buộc",
                'name.numeric' => "Viết sai số điện thoại",
                'email.required' => "Email là trường bắt buộc",
                'email.email' => "Sai định dạng email",
            ]
        );

        DB::table('contact')->insert([
            'title' => $request->title,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'active' => 1,
        ]);

        return redirect()->route('contact.list');
    }

    public function edit($id)
    {
        $array['contact']=DB::table('contact')->find($id);
        return view('admins/page/contact/edit',$array);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric',
                'email' => 'required|email',
            ],
            [
                'title.required' => "Tên là trường bắt buộc",
                'address.required' => "Tên là trường bắt buộc",
                'phone.required' => "Số điện thoại là trường bắt buộc",
                'name.numeric' => "Viết sai số điện thoại",
                'email.required' => "Email là trường bắt buộc",
                'email.email' => "Sai định dạng email",
            ]
        );

        if ($request->active=="null") {
            $active=0;
        }
        else{
            $active=1;
        }

        DB::table('contact')->update([
            'title' => $request->title,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'active' => $active,
        ]);

        return redirect()->route('contact.list');
    }

    public function delete($id)
    {
        DB::table('contact')->where('id',$id)->delete();

        return redirect()->route('contact.list');
    }
}
