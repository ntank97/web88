<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OtherServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $data['other_service'] = DB::table('other_service')
            ->select('other_service.*', 'cate_other_service.name as cate_other_service')
            ->join('cate_other_service', 'other_service.cate_id', '=', 'cate_other_service.id')
            ->orderByDesc('id')
            ->get();
        return view('admins.pages.serviceother.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cate_other_service']  = DB::table('cate_other_service')->get();
        return view('admins.pages.serviceother.add',$data);
    }
    public function createCate()
    {
        $data['cate_other_service']  = DB::table('cate_other_service')->get();
        return view('admins.pages.serviceother.cate',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [

                'name' => 'required|min:3',
                'contentt' => 'required',
            ],
            [
                'name.required'=>'Tên ít nhất 3 kí tự',
            ]);


        DB::table('other_service')->insert([
            'name'=>$request->name,
            'cate_id'=>$request->cate_other_service,
            'content' =>$request->contentt,
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

                'name' => 'required|min:3|unique:cate_other_service',
            ],
            [

            ]);


        DB::table('cate_other_service')->insert([
            'name'=>$request->name,
            'slug'=>str_slug($request->name),
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
        $data['cate_other_service'] = DB::table('cate_other_service')->get();
        $data['other_service'] = DB::table('other_service')->find($id);
        return view('admins.pages.serviceother.edit',$data);
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

        $this->validate($request,
            [

                'name' => 'required|min:3',
                'contentt' => 'required',
            ],
            [
                'name.required'=>'Tên ít nhất 3 kí tự',
            ]);


        DB::table('other_service')->where('id',$id)->update([
            'name'=>$request->name,
            'cate_id'=>$request->cate_other_service,
            'content' =>$request->contentt,
            'active'=>$request->active,
            'created_at'=>now(),
        ]);
        return redirect()->route('otherservice.index')->with('thongbao', 'Thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('other_service')->where('id','=',$id)->delete();
        return redirect()->route('otherservice.index')->with('thongbao','Xóa thành công!');
    }
    public function destroyCate($id)
    {
        DB::table('cate_other_service')->where('id','=',$id)->delete();
        return redirect()->back()->with('thongbao','Xóa thành công!');
    }

    public function setactive($id, $status)
    {
        DB::table('other_service')->where('id', '=', $id)->update([
            'active' => $status,
        ]);
        return redirect()->back()->with('thanhcong', 'Thành công');
    }

    public function setactiveCate($id, $status)
    {
        DB::table('cate_other_service')->where('id', '=', $id)->update([
            'active' => $status,
        ]);
        return redirect()->back()->with('thanhcong', 'Thành công');
    }
}
