<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $data['service_count'] = DB::table('service')->count();
        $data['cate_service_count'] = DB::table('cate_service')->count();
        view()->share( $data);

    }

    public function index()
    {
        $data['service'] = DB::table('service')
            ->select('service.*', 'cate_service.name as cate_service')
            ->join('cate_service', 'service.cate_id', '=', 'cate_service.id')
            ->orderByDesc('id')
            ->get();

        return view('admins.pages.service.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cate_service']  = DB::table('cate_service')->get();
        return view('admins.pages.service.add',$data);
    }
    public function createCate()
    {
        $data['cate_service']  = DB::table('cate_service')->get();
        return view('admins.pages.service.cate',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request,
            [

                'name' => 'required|min:3',
                'link' => 'required|regex:'.$regex,
            ],
            [
                'name.required'=>'Tên ít nhất 3 kí tự',
            ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_" . $name;
            while (file_exists('assets/img_service/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_service/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo1.png';
        }
        DB::table('service')->insert([
            'name'=>$request->name,
            'slug'=>str_slug($request->name),
            'image'=>$file_name,
            'link'=>$request->link,
            'cate_id'=>$request->cate_service,
            'active'=>$request->active,
            'created_at'=>now(),
        ]);
        return redirect()->back()->with('thongbao', 'Thành công!');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCate(Request $request)
    {

        $this->validate($request,
            [

                'name' => 'required|min:3|unique:cate_service',
            ],
            [

            ]);
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_icoin" . $name;
            while (file_exists('assets/img_icoin/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_icoin/', $image);
            $file_name = $image;

        } else {
            $file_name = 'logo1.png';
        }

        DB::table('cate_service')->insert([
            'name'=>$request->name,
            'slug'=>str_slug($request->name),
            'icoin'=>$file_name,
            'active'=>$request->active,
            'created_at'=>now(),
        ]);
        return redirect()->back()->with('thongbao', 'Thành công!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['cate_service'] = DB::table('cate_service')->get();
        $data['service'] = DB::table('service')->find($id);
        return view('admins.pages.service.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $image_update = DB::table('service')->where('id', '=', $id)->pluck('image');

        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request,
            [

                'name' => 'required|min:3',
                'link' => 'required|regex:'.$regex,
            ],
            [
                'name.required'=>'Tên ít nhất 3 kí tự',
            ]);
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_image_" . $name;
            while (file_exists('assets/img_service/' . $image)) {
                $image = str_random(4) . "_image_" . $name;
            }
            $file->move('assets/img_service/', $image);
            $file_name = $image;
            if (file_exists('assets/img_service/' . $image_update[0]) && $image_update[0] != '') {
                unlink('assets/img_service/' . $image_update[0]);
            }


        } else {
            $file_name = DB::table('service')->where('id', '=', $id)->pluck('image')->first();

        }

        DB::table('service')->where('id','=',$id)->update([
            'name'=>$request->name,
            'slug'=>str_slug($request->name),
            'image'=>$file_name,
            'link'=>$request->link,
            'cate_id'=>$request->cate_service,
            'active'=>$request->active,
            'created_at'=>now(),
        ]);


        return redirect()->route('service.index')->with('thongbao', 'Add Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('service')->where('id','=',$id)->delete();
        return redirect()->route('service.index')->with('thongbao','Xóa thành công!');
    }
    public function destroyCate($id)
    {
        DB::table('cate_service')->where('id','=',$id)->delete();
        return redirect()->back()->with('thongbao','Xóa thành công!');
    }

    public function setactive($id, $status)
    {
        DB::table('service')->where('id', '=', $id)->update([
            'active' => $status,
        ]);
        return redirect()->back()->with('thanhcong', 'Thành công');
    }

    public function setactiveCate($id, $status)
    {
        DB::table('cate_service')->where('id', '=', $id)->update([
            'active' => $status,
        ]);
        return redirect()->back()->with('thanhcong', 'Thành công');
    }
}
