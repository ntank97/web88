@extends('layout.master-layout')
@section('content')
<div class="content">
    <div class="content__top">
        <div class="content__top-img">
            <div class="col-12 col-md-12 content-block">
                <h3 class="content__top-title wow bounceInLeft">
                    Hơn 1000 giao diện web cực đẹp và liên tục được cập nhật
                </h3>
                <p class="content__top-desc wow bounceInRight">
                    Thay đổi dễ dàng theo phong cách của riêng của bạn
                </p>
                <form action=""  style="width: 100%;padding-left:40%">
                    <div class="input-group col-sm-4 form__search">
                        <input  class="form-control"
                                placeholder="Tìm kiếm" name="name" value="{{ \Request::get('name') }}">
                        <button class="input-group-addon btn btn-primary btn-search" >
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!--  -->
    <div class="list__category">
        <div class="container">
            <div class="row list__category-item wow bounceInUp">
                <div class="col-md-3 col-sm-6">
                    <center>
                        <a href="javascript:void(0)">
                            <img src="http://thietkewebnhanh247.com/wp-content/uploads/2016/11/cart.png" alt="">
                        </a>
                        <p><a href="javascript:void(0)"><span>Mẫu web</span> thương mại điện tử</a></p>
                    </center>
                </div>
                <div class="col-md-3 col-sm-6">
                    <center>
                        <a href="javascript:void(0)">
                            <img src="http://thietkewebnhanh247.com/wp-content/uploads/2016/11/intro-web.png" alt="">
                        </a>
                        <p><a href="javascript:void(0)">Mẫu web giới thiệu công ty</a></p>
                    </center>
                </div>
                <div class="col-md-3 col-sm-6">
                    <center>
                        <a href="javascript:void(0)">
                            <img src="http://thietkewebnhanh247.com/wp-content/uploads/2016/11/news.png" alt="">
                        </a>
                        <p><a href="javascript:void(0)">Mẫu web tin tức</a></p>
                    </center>
                </div>
                <div class="col-md-3 col-sm-6">
                    <center>
                        <a href="javascript:void(0)">
                            <img src="http://thietkewebnhanh247.com/wp-content/uploads/2016/11/music.png" alt="">
                        </a>
                        <p><a href="javascript:void(0)">Mẫu web âm nhạc</a></p>
                    </center>
                </div>
            </div>
            <div class="row list__category-item wow bounceInUp" style="padding-top: 30px;">
                <div class="col-md-3 col-sm-6">
                    <center>
                        <a href="javascript:void(0)">
                            <img src="http://thietkewebnhanh247.com/wp-content/uploads/2016/11/heart.png" alt="">
                        </a>
                        <p><a href="javascript:void(0)">Mẫu web ảnh viện áo cưới</a></p>
                    </center>
                </div>
                <div class="col-md-3 col-sm-6">
                    <center>
                        <a href="javascript:void(0)">
                            <img src="http://thietkewebnhanh247.com/wp-content/uploads/2016/11/real-estate.png" alt="">
                        </a>
                        <p><a href="javascript:void(0)">Mẫu web bất động sản</a></p>
                    </center>
                </div>
                <div class="col-md-3 col-sm-6">
                    <center>
                        <a href="javascript:void(0)">
                            <img src="http://thietkewebnhanh247.com/wp-content/uploads/2016/11/education.png" alt="">
                        </a>
                        <p><a href="javascript:void(0)">Mẫu web giáo dục</a></p>
                    </center>
                </div>
                <div class="col-md-3 col-sm-6">
                    <center>
                        <a href="javascript:void(0)">
                            <img src="http://thietkewebnhanh247.com/wp-content/uploads/2016/11/personal.png" alt="">
                        </a>
                        <p><a href="javascript:void(0)">Mẫu web cá nhân</a></p>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!-- main -->
    <div class="woocommerce">
        <div class="container">
            <div class="row">
                @if(isset($products))
                    @foreach($products as $product)
                        <div class="col-12 col-sm-6 box col-md-4 woocommerce__list wow bounceInLeft woocommerce__list-img" style="background-image:url({{ asset('image/'.$product->image )}})">
                            <div style="padding-top: 400px;">
                                <center>
                                    <p>{{ $product->name }}</p>
                                </center>
                                <p class="woocommerce__list-text">
                                    <a href="{{ $product->link }}" class="btn btn-warning">
                                        <i class="far fa-eye"></i>
                                        Dùng thử</a>
                                    <a class="btn btn-success" onclick="document.getElementById('id01').style.display='block'">
                                        <i class="fas fa-check"></i>
                                        Chọn mẫu web này</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- phân trang -->
    <center>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{ $products->links() }}
            </ul>
        </nav>
    </center>
@endsection