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
                <div class="input-group col-sm-4 form__search">
                    <input class="form-control"
                           placeholder="Tìm kiếm">
                    <div class="input-group-addon btn-search" >
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--  -->
    <div class="content-main" style="padding: 30px 0 !important;">
        <div class="container">
            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3722.8580470816796!2d105.7853450142462!3d21.07833109146162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135aacbe6b051d3%3A0x99154d3da13e19eb!2zNDMgUGjhuqFtIFbEg24gxJDhu5NuZywgWHXDom4gxJDhu4luaCwgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1564358693310!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="contact__company" style="padding-top: 50px!important;">
                <div class="col-md-5 col-12">
                    <h3 class="contact__company-title">Liên hệ</h3>
                    <p class="contact__company-desc">Thiết kế web nhanh 247</p>
                    <p class="contact__company-name">Công ty Công nghệ và Dịch vụ Talent Wins</p>

                    <div class="contact__box">
                        <p class="contact__box-location">
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            <span>Tòa nhà CT2, khu đô thị Constrexim Thái Hà, Phạm Văn Đồng, Hà Nội</span>
                        </p>
                        <p>
                            <i class="fas fa-phone-alt fa-fw"></i>
                            <span>0927 15 15 35</span>
                        </p>
                        <p>
                            <i class="fas fa-envelope fa-fw"></i>
                            <a href="javascript:void(0)"><span>contact@talentwins.co</span></a>
                        </p>
                    </div>
                </div>
                <div class="col-md-7 col-12">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên của bạn</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Tên của bạn">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Địa chỉ email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số điện thoại</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tiêu đề">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Nội dung</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Thông điệp"></textarea>
                        </div>
                        <button style="background-color: #01923e; margin-left: 3%" type="submit" class="btn btn-primary" onclick="window.alert('Đăng kí thành công!')">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection