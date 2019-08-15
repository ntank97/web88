<?php

namespace App\Http\Controllers;

use App\CateWeb;
use App\Web;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function __construct()
    {
        $cateweb = CateWeb::all();
        View::Share('cateweb',$cateweb);
    }

    public function khoGiaoDien(Request $request)
    {
        $webs = Web::where([
            'active' => Web::STATUS_PUBLIC
        ]);
        if ($request->name != null){
            $webs->where('name','like','%'.$request->name.'%');
        }
        $viewData = [
            'webs' => $webs->paginate(18),
        ];
//        dd($viewData);
        return view('pages.khogiaodien',$viewData);
    }

    public function getListProduct(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);

        if ($id = array_pop($url))
        {
            $products = Web::where([
                'cate_id' => $id,
                'active'      => Web::STATUS_PUBLIC
            ]);
            if ($request->name != null){
                $products->where('name','like','%'.$request->name.'%');
            }
            $viewData = [
                'products' => $products->orderBy('id','DESC')->paginate(10)
            ];
            return view('pages.product.index',$viewData);
        }
        return redirect('/');
    }



    public function lienHe()
    {
        return view('pages.lienhe');
    }

    public function khachHang()
    {
        return view('pages.khachhang');
    }

    public function seo()
    {
        return view('pages.seo');
    }

    public function thietKeWebsite()
    {
        return view('pages.thietke-website');
    }

    public function bangGiaThietKeWebsite()
    {
        return view('pages.banggiathietkewebsite');
    }
    public function chamSocWebsite()
    {
        return view('pages.chamsocwebsite');
    }
    public function dichVuThietKeWebsite()
    {
        return view('pages.dichvu-thietkewebgiare');
    }

    public function dichVuSeoWebsite()
    {
        return view('pages.dichvuseowebsite');
    }
    public function dichVuVietBaiChuanSeo()
    {
        return view('pages.dichvuvietbaichuanseo');
    }
    public function dieuKienVaChinhSach()
    {
        return view('pages.dieukienvachinhsach');
    }
    public function domaiGiaRe()
    {
        return view('pages.domaingiare');
    }
    public function gioiThieuDichVu()
    {
        return view('pages.gioithieudichvu');
    }
    public function hinhThucThanhToan()
    {
        return view('pages.hinhthucthanhtoan');
    }
    public function hostingChatLuongCao()
    {
        return view('pages.hostingchatluongcao');
    }
    public function hoTroKhachHang()
    {
        return view('pages.hotrokhachhang');
    }


    public function quyTrinhThietKeWebsite()
    {
        return view('pages.quuytrinhthietkewebsite');
    }

    public function thietKeWebChuanMobile()
    {
        return view('pages.thietkewebchuanmoblie');
    }
    public function thietKeWebChuanSeoChuyenNghiep()
    {
        return view('pages.thietkewebchuanseochuyennghiep');
    }

    public function thietKeWebsiteTheoMau()
    {
        return view('pages.thietkewebsitetheomau');
    }
    public function thietKeWebTronGoiGiaRe()
    {
        return view('pages.thietkewebtrongoigiare');
    }
    public function tinTuc()
    {
        return view('pages.tintuc');
    }
    public function tuyenDung()
    {
        return view('pages.tuyendung');
    }

    public function thietKeWebTheoYeuCau()
    {
        return view('pages.thietkewebtheoyeucau');
    }

    public function dichVuThietKeWebGiaRe()
    {
        $sliders = DB::table('slider_content')->where('active',1)->get();
//        dd($sliders);
        return view('pages.dichvu-thietkewebgiare',compact('sliders'));
    }
}
