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
        </div>
    </div>

    <!-- main -->
    <div class="woocommerce">
        <div class="container">
            <div class="row">
                @if(isset($webs))
                    @foreach($webs as $web)
                        <div class="col-12 col-sm-6 box col-md-4 woocommerce__list wow bounceInLeft woocommerce__list-img" style="background-image:url({{ asset('image/'.$web->image )}})">
                            <div style="padding-top: 400px;">
                                <center>
                                    <p>{{ $web->name }}</p>
                                </center>
                                <p class="woocommerce__list-text">
                                    <a href="{{ $web->link }}" class="btn btn-warning">
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
                {{ $webs->links() }}
            </ul>
        </nav>
    </center>
    <!-- Contact -->

    <script>
        window.onscroll = function() { scrollFunction(), scrollMenuHide() };

        function scrollFunction() {
            if (window.pageYOffset > 450) {
                document.getElementById("back-to-top").style.display = "block";
            } else {
                document.getElementById("back-to-top").style.display = "none";
            }
        };
        if($('#back-to-top').length) {
            var scrollTrigger = 100,
                backToTop = function () {
                    var scrollTop = $(window).scrollTop();
                    if (scrollTop > scrollTrigger) {
                        $('#back-to-top').addClass('show');
                    } else {
                        $('#back-to-top').removeClass('show');
                    }
                };
            backToTop();
            $(window).on('scroll', function () {
                backToTop();
            });
            $('#back-to-top').on('click', function (e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 700);
            });
        }

    </script>
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Font-awesome -->
    <script src="https://kit.fontawesome.com/df8fdd30a5.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- Slider top -->
    <script src="js/modernizr.custom.46884.js"></script>
    <script src="js/jquery.slicebox.js"></script>
    <script src="js/textyle.js"></script>
    <!-- Textyle -->
    <script src="js/main.js"></script>
    <!-- Slick JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
    <!-- WOW JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- Slider.js -->
    <script src="js/slider.js"></script>

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v4.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Your customer chat code -->
    <div class="fb-customerchat"
         attribution=setup_tool
         page_id="100910621259961"
         logged_in_greeting="Xin chào! Web88 có thể giúp gì cho bạn?"
         logged_out_greeting="Xin chào! Web88 có thể giúp gì cho bạn?">
    </div>
    </html>
@endsection