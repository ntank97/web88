<header>
    <div class="header">
        <!-- Thanh điều hướng -->

        <nav class="navbar navbar-expand-lg navbar-dark nav-top" id="navbar">
            <div class="container">
                <!-- Brand/logo -->
                <a class="navbar-brand" href="index.html">
                    <img src="./image/logo.jpg" alt="logo" class="logo">
                </a>

                <!-- Links -->
                <ul class="navbar-nav ul-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark href="index.html">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light" href="{{ Route('kho.giao.dien') }}">KHO GIAO DIỆN <i class="fa fa-plus plus" aria-hidden="true"></i></a>
                        <div class="dropdown-content">
                            @if(isset($cateweb))
                                @foreach($cateweb as $cate)
                                    <a href="">{{ $cate->name }}</a>
                                @endforeach
                            @endif
                        </div>
                    </li>
                    <li class="nav-item  dropdown">
                        <a class="nav-link text-light" href="dichvu-thietkewebgiare.html">DỊCH VỤ <i class="fa fa-plus plus" aria-hidden="true"></i></a>
                        <div class="dropdown-content">
                            <a href="dichvu-thietkewebgiare.html">Thiết kế web giá rẻ</a>
                            <a href="#">Thiết kế web theo mẫu</a>
                            <a href="#">Thiết kế web theo yêu cầu</a>
                            <a href="#">Thiết kế web chuẩn SEO chuyên nghiệp</a>
                            <a href="#">Thiết kế web chuẩn Mobile</a>
                            <a href="#">Dịch vụ SEO website</a>
                            <a href="#">Dịch vụ viết bài SEO website</a>
                            <a href="#">Thiết kế web trọn gói giá rẻ</a>
                            <a href="#">Chăm sóc website</a>
                            <a href="#">Hosting chất lượng cao</a>
                            <a href="#">Domain giá rẻ</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="thietkewebsite.html">THIẾT KẾ WEBSITE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="seo.html">SEO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="khachhang.html">KHÁCH HÀNG</a>
                    </li>
                    <li class="nav-item  dropdown">
                        <a href="#" class="nav-link text-light">THÊM <i class="fa fa-plus plus" aria-hidden="true"></i></a>
                        <div class="dropdown-content">
                            <a href="#">Giới thiệu dịch vụ</a>
                            <a href="#">Bảng giá web trọn gói</a>
                            <a href="#">Tin tức</a>
                            <a href="#">Hỗ trợ khách hàng</a>
                            <a href="#">Hình thức thanh toán</a>
                            <a href="#">Tuyển dụng</a>
                            <a href="#">Quá trình thiết kế website</a>
                            <a href="#">Điều kiện và chính sách</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="lienhe.html">LIÊN HỆ</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-light" onclick="document.getElementById('id01').style.display='block'">ĐĂNG KÝ</a>
                    </li>
                </ul>
                <span class="ba-vach" onclick="openNav()">&#9776;</span>
            </div>
        </nav>
        <!-- end navbar -->
    </div>
    <div id="mySidenav" class="sidenav">
        <div>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" title="Đóng Menu">&times;</a>
        </div>

        <a href="index.html">TRANG CHỦ</a>
        <a class="nav-link col1">KHO GIAO DIỆN<i class="fa fa-plus plus" style="
    margin-left: 0.5rem;" aria-hidden="true"></i></a>
        <div class="kho-giao-dien" id="col1" style="display: none;">
            <a href="khogiaodien.html" class="nav-link">Mẫu web thương mại điện tử</a>
            <a href="khogiaodien.html">Mẫu web giới thiệu công ty  </a>
            <a href="khogiaodien.html">Mẫu web ảnh viện áo cưới  </a>
            <a href="khogiaodien.html">Mẫu web âm nhạc  </a>
            <a href="khogiaodien.html">Mẫu web nhà hàng khách sạn  </a>
            <a href="khogiaodien.html">Mẫu web bất động sản  </a>
            <a href="khogiaodien.html">Mẫu web cá nhân  </a>
            <a href="khogiaodien.html">Mẫu web du lịch  </a>
            <a href="khogiaodien.html">Mẫu web giáo dục  </a>
            <a href="khogiaodien.html">Mẫu web tin tức  </a>
        </div>
        <a class="nav-link col2">DỊCH VỤ<i class="fa fa-plus plus" aria-hidden="true" style="
    margin-left: 0.5rem;"></i></a>
        <div class="kho-giao-dien" id="col2" style="display: none;">
            <a href="dichvu-thietkewebgiare.html">Thiết kế web giá rẻ</a>
            <a  href="dichvu-thietkewebgiare.html">Thiết kế web theo mẫu</a>
            <a  href="dichvu-thietkewebgiare.html">Thiết kế web theo yêu cầu</a>
            <a  href="dichvu-thietkewebgiare.html">Thiết kế web chuẩn SEO chuyên nghiệp</a>
            <a  href="dichvu-thietkewebgiare.html">Thiết kế web chuẩn Mobile</a>
            <a  href="dichvu-thietkewebgiare.html">Dịch vụ SEO website</a>
            <a  href="dichvu-thietkewebgiare.html">Dịch vụ viết bài SEO website</a>
            <a  href="dichvu-thietkewebgiare.html">Thiết kế web trọn gói giá rẻ</a>
            <a  href="dichvu-thietkewebgiare.html">Chăm sóc website</a>
            <a  href="dichvu-thietkewebgiare.html">Hosting chất lượng cao</a>
            <a  href="dichvu-thietkewebgiare.html">Domain giá rẻ</a>
        </div>
        <a href="thietkewebsite.html">THIẾT KẾ WEBSITE</a>
        <a href="seo.html">SEO</a>
        <a href="khachhang.html">KHÁCH HÀNG</a>
        <a href="#" class="nav-link col3">THÊM<i class="fa fa-plus plus" aria-hidden="true" style="
    margin-left: 0.5rem;"></i></a>
        <div class="kho-giao-dien" id="col3" style="display: none;">
            <a href="#">Giới thiệu dịch vụ</a>
            <a href="#">Bảng giá web trọn gói</a>
            <a href="#">Tin tức</a>
            <a href="#">Hỗ trợ khách hàng</a>
            <a href="#">Hình thức thanh toán</a>
            <a href="#">Tuyển dụng</a>
            <a href="#">Quá trình thiết kế website</a>
            <a href="#">Điều kiện và chính sách</a>
        </div>
        <a href="lienhe.html">LIÊN HỆ</a>
        <a onclick="document.getElementById('id01').style.display='block'">ĐĂNG KÝ</a>
    </div>
    <div class="wrap-header">
        @yield('slider')

    </div>
</header>