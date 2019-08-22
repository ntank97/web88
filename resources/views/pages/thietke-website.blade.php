@extends('layout.master-layout')
@section('title','Thiết kế website')
@section('content')
    <div class="content">
        <div class="container mt-1">
            <div class="row" style="margin-top: 80px;">
                <div class="col-md-8">
                    <div class="mt-1">
                        <!-- <div class="media p-12"> -->
                        @foreach($tkweb as $value)
                            <div class="row">
                                <img class="col-md-4"
                                     src="{{$value->image}}" alt="Anh Seo" style="width: 200px;height: 200px"
                                     class="mr-3 mt-2">
                                <div class=" col-md-8">
                                    <i class="fa fa-calendar"> &nbsp </i>23-06-2019
                                    <p><a href="javascript:void(0)">{{$value->title}}</a></p>
                                    <p>{{$value->summary}}</p>
                                </div>
                            </div>
                            <!-- </div> -->
                        @endforeach

                    </div>
                </div>

                <div class="col-md-4">
                    <table border="1" style="border:1px solid black !important" class="text-left" cellpadding="9"
                           cellspacing="10">
                        <tr style="background: #06557c">
                            <td>
                                <h3 style="color: white;">
                                    <i class="fa-list-ul fa"> </i> <span>Xem nhiều</span>
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="javascript:void(0)" title="">Top 5 đơn vị thiết kế website tốt nhất tại TP Hồ
                                    Chí Minh</a></td>
                        </tr>
                        <tr>
                            <td><a href="javascript:void(0)" title="">Top 5 trang web bất động sản uy tín, chuyên nghiệp
                                    của Việt Nam</a>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="javascript:void(0)" title="">Thiết kế web trọn gói giá rẻ uy tín chuyên nghiệp
                                    chuẩn SEO</a></td>
                        </tr>
                        <tr>
                            <td><a href="javascript:void(0)" title="">Thiết kế web bán hàng chuyên nghiệp</a></td>
                        </tr>
                        <tr>
                            <td><a href="javascript:void(0)" title="">Top trang web đăng tin bất động sản – rao vặt miễn
                                    phí tốt nhất
                                    2017</a></td>
                        </tr>
                        <tr>
                            <td><a href="javascript:void(0)" title="">Thiết kế website tư vấn lô đề , xổ số kiến
                                    thiết</a></td>
                        </tr>
                        <tr>
                            <td><a href="javascript:void(0)" title="">Dịch vụ SEO từ khóa website giá rẻ , uy tín chuyên
                                    nghiệp</a></td>
                        </tr>
                        <tr>
                            <td><a href="javascript:void(0)" title="">Thiết kế web chuẩn SEO chuyên nghiệp</a></td>
                        </tr>
                        <tr>
                            <td><a href="javascript:void(0)" title="">TOP 6 công ty thiết kế website uy tín, chuyên
                                    nghiệp tại Hà Nội</a>
                            </td>
                        </tr>
                        <tr>
                            <td><a href="javascript:void(0)" title="">Thiết kế website bất động sản nhà đất</a></td>
                        </tr>
                        <tr>
                            <td><a href="javascript:void(0)" title="">Kinh nghiệm thuê thiết kế website chuyên
                                    nghiệp</a></td>
                        </tr>
                        <tr>
                            <td><a href="javascript:void(0)" title="">Thiết kế web du lịch uy tín chuyên nghiệp chuẩn
                                    SEO</a></td>
                        </tr>
                    </table>
                    <a href="javascript:void(0)" title=""><img class="img-1" style="width: 100%;"
                                                               src="http://thietkewebnhanh247.com/wp-content/themes/thietkewebsite/img/thiet-ke-website.jpg"
                                                               alt="Thiết kế web giá rẻ"></a>
                </div>
            </div>
            <br>
        </div>
        <!--  -->

        <center>
            <ul class="pagination justify-content-center">
                <ul class="pagination justify-content-center">
                    <div style="width: 50%;margin: auto">  {!!$tkweb->links()!!}</div>
                </ul>
            </ul>
        </center>

@endsection
