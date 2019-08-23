<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class WebStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $data['web'] = DB::table('web')
            ->select('web.*', 'cate_web.name as cate_web')
            ->join('cate_web', 'web.cate_id', '=', 'cate_web.id')
            ->orderByDesc('id')
            ->get();

        return view('admins.pages.webstore.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('add')) {
            $data['cate_web'] = DB::table('cate_web')->get();
            return view('admins.pages.webstore.add', $data);
        } else {
            return view('admins.page.account.error');
        }
    }


    public function createCate()
    {
        if (Gate::allows('add')) {
            $data['cate_web'] = DB::table('cate_web')->get();
            return view('admins.pages.webstore.cate', $data);
        } else {
            return view('admins.page.account.error');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request,
            [

                'name' => 'required|min:3',
                'link' => 'required|regex:' . $regex,
            ],
            [
                'name.required' => 'Tên ít nhất 3 kí tự',
            ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_" . $name;
            while (file_exists('assets/img_webs/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_webs/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo1.png';
        }
        DB::table('web')->insert([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'image' => $file_name,
            'link' => $request->link,
            'cate_id' => $request->cate_web,
            'active' => $request->active,
            'created_at' => now(),
        ]);
        return redirect()->back()->with('thongbao', 'Thành công!');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeCate(Request $request)
    {

        $this->validate($request,
            [

                'name' => 'required|min:3|unique:cate_web',
            ],
            [

            ]);
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_icon" . $name;
            while (file_exists('assets/img_icon/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_icon/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo1.png';
        }

        DB::table('cate_web')->insert([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'icon' => $file_name,
            'active' => $request->active,
            'created_at' => now(),
        ]);
        return redirect()->back()->with('thongbao', 'Thành công!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['web'] = DB::table('web')->find($id);
        if (Gate::allows('edit', $data)) {
            $data['cate_web'] = DB::table('cate_web')->get();
            return view('admins.pages.webstore.edit', $data);
        } else {
            return view('admins.page.account.error');
        }


    }

    public function editCate($id)
    {
        $data['cate_web'] = DB::table('cate_web')->find($id);
        if (Gate::allows('edit', $data)) {

            return view('admins.pages.webstore.editCate', $data);
        } else {
            return view('admins.page.account.error');
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $image_update = DB::table('web')->where('id', '=', $id)->pluck('image');

        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request,
            [

                'name' => 'required|min:3',
                'link' => 'required|regex:' . $regex,
            ],
            [
                'name.required' => 'Tên ít nhất 3 kí tự',
            ]);
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_" . $name;
            while (file_exists('assets/img_webs/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_webs/', $image);
            $file_name = $image;
            if (file_exists('assets/img_webs/' . $image_update[0]) && $image_update[0] != '') {
                unlink('assets/img_webs/' . $image_update[0]);
            }


        } else {
            $file_name = DB::table('web')->where('id', '=', $id)->pluck('image')->first();

        }

        DB::table('web')->where('id', '=', $id)->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'image' => $file_name,
            'link' => $request->link,
            'cate_id' => $request->cate_web,
            'active' => $request->active,
            'created_at' => now(),
        ]);


        return redirect()->route('webstore.index')->with('thongbao', 'Add Success');
    }

    public function updateCate(Request $request, $id)
    {
        dd($request->all());
        $image_update = DB::table('cate_web')->where('id', '=', $id)->pluck('image');

        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request,
            [

                'name' => 'required|min:3',
                'link' => 'required|regex:' . $regex,
            ],
            [
                'name.required' => 'Tên ít nhất 3 kí tự',
            ]);
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_" . $name;
            while (file_exists('assets/img_webs/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_webs/', $image);
            $file_name = $image;
            if (file_exists('assets/img_webs/' . $image_update[0]) && $image_update[0] != '') {
                unlink('assets/img_webs/' . $image_update[0]);
            }


        } else {
            $file_name = DB::table('web')->where('id', '=', $id)->pluck('image')->first();

        }

        DB::table('web')->where('id', '=', $id)->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'image' => $file_name,
            'link' => $request->link,
            'cate_id' => $request->cate_web,
            'active' => $request->active,
            'created_at' => now(),
        ]);


        return redirect()->route('webstore.index')->with('thongbao', 'Add Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_update = DB::table('web')->where('id', '=', $id)->pluck('image');
        if (file_exists('assets/img_webs/' . $image_update[0]) && $image_update[0] != '') {
            unlink('assets/img_webs/' . $image_update[0]);
        }
        DB::table('web')->where('id', '=', $id)->delete();

        return redirect()->route('webstore.index')->with('thongbao', 'Xóa thành công!');
    }

    public function destroyCate($id)
    {
        $image_update = DB::table('cate_web')->where('id', '=', $id)->pluck('icon');
//        dd($image_update);
        if (file_exists('assets/img_icon/' . $image_update[0]) && $image_update[0] != '') {
            unlink('assets/img_icon/' . $image_update[0]);
        }

        DB::table('cate_web')->where('id', '=', $id)->delete();

        return redirect()->back()->with('thongbao', 'Xóa thành công!');
    }

    public function setactive($id, $status)
    {
        DB::table('web')->where('id', '=', $id)->update([
            'active' => $status,
        ]);
        return redirect()->back()->with('thanhcong', 'Thành công');
    }

    public function setactiveCate($id, $status)
    {
        DB::table('cate_web')->where('id', '=', $id)->update([
            'active' => $status,
        ]);
        return redirect()->back()->with('thanhcong', 'Thành công');
    }
}
