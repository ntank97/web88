@extends('admins.layout.master-layout')
@section('title')
    Dịch vụ khác
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dịch vụ khác
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dịch vụ khác</li>
            </ol>
        </section>
        <br>
        <div>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach

                </div>

            @endif
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            {{-- Mục lục --}}
                            <h3 class="box-title">Danh mục</h3>

                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{route('otherservice.createCate')}}"><i class="fa fa-inbox"></i> Thêm thể loại
                                        website
                                        <span class="label label-primary pull-right">{{$cate_other_service_count}}</span></a></li>
                                <li><a href="{{route('otherservice.create')}}"><i class="fa fa-envelope-o"></i> Thêm website
                                        <span class="label label-primary pull-right">{{$other_service_count}}</span></a></li>
                                </a>
                                </li>
                                <li><a href="{{route('otherservice.index')}}"><i class="fa fa-file-text-o"></i> Danh
                                        sách</a></li>

                            </ul>
                        </div>

                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                    {{-- End mục luc --}}

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box box-primary">
                        <h3 style="text-align: left; padding-left: 5px">Thêm dịch vụ khác</h3>
                        <form role="form" method="POST" action="{{route('otherservice.store')}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Thể loại dịch vụ khác</label>
                                    <select class="form-control" name="cate_service">
                                        @foreach($cate_other_service as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên dịch vụ khác (*)</label>
                                    <input type="text" class="form-control" placeholder="Web bán hàng" name="name"
                                           value="{{ old('name') }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung (*)</label>
                                    <textarea name="contentt" class="form-control" rows="10" placeholder="Nhập nội dung">

                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tiêu điểm</label>
                                    <label class="radio-inline">
                                        <input name="active" value="1" checked="" type="radio">Có
                                    </label>
                                    <label class="radio-inline">
                                        <input name="active" value="0" type="radio">Không
                                    </label>
                                </div>
                                {{--Hết tiêu điểm--}}

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>

                            </div>

                        </form>
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
    <script>

        function showIMG() {
            var fileInput = document.getElementById('image');
            var filePath = fileInput.value; //lấy giá trị input theo id
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i; //các tập tin cho phép
            //Kiểm tra định dạng
            if (!allowedExtensions.exec(filePath)) {
                alert('Bạn chỉ có thể dùng ảnh dưới định dạng .jpeg/.jpg/.png/.gif extension.');
                fileInput.value = '';
                return false;
            } else {
                //Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('viewImg').innerHTML = '<img style="width:100px; height: 100px;" src="' + e.target.result + '"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

    </script>

@endsection

