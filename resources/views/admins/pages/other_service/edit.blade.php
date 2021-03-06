@extends('admins.layout.master-layout')
@section('title')
    Dịch vụ
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dịch vụ
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dịch vụ</li>
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
                                {{--<li><a href="{{route('other_service.createCate')}}"><i class="fa fa-inbox"></i> Thêm thể loại--}}
                                {{--dịch vụ--}}
                                {{--<span class="label label-primary pull-right">{{$cate_other_service_count}}</span></a></li>--}}
                                <li><a href="{{route('other_service.create')}}"><i class="fa fa-envelope-o"></i> Thêm dịch vụ
                                        <span class="label label-primary pull-right">{{$other_service_count}}</span></a></li>
                                </a>
                                </li>
                                <li><a href="{{route('other_service.index')}}"><i class="fa fa-file-text-o"></i> Danh
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
                        <h3 style="text-align: left; padding-left: 5px">Thêm dịch vụ</h3>
                        <form role="form" method="POST" action="{{route('other_service.update',['id'=>$other_service->id])}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                {{--<div class="form-group">--}}
                                {{--<label>Thể loại</label>--}}
                                {{--<select class="form-control" name="cate_other_service">--}}
                                {{--@foreach($cate_other_service as $cate)--}}
                                {{--<option value="{{$cate->id}}">{{$cate->name}}</option>--}}
                                {{--@endforeach--}}
                                {{--</select>--}}
                                {{--</div>--}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên dịch vụ (*)</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên dịch vụ" name="name"
                                           value="{{$other_service->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề dịch vụ (*)</label>
                                    <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="title"
                                           value="{{ $other_service->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả (*)</label>
                                    <textarea class="form-control" name="description"
                                              placeholder="Nhập tóm tắt nội dung">{{ $other_service->description}}</textarea>
                                </div>
                                <label for="exampleInputEmail1">Tóm tắt dịch vụ (*)</label>
                                <div class="form-group">
                                    <textarea name="summary" class="form-control" cols="50" rows="10"
                                              placeholder="Nhập tóm tắt nội dung">{{ $other_service->summary }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung (*)</label>
                                    <div class="form-group">
                                        <textarea name="contentt" rows="10" placeholder="Nhập nội dung"
                                                  class="form-control">{{ $other_service->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Ảnh nền</label>
                                        <input type="file" id="image" name="image" onchange="showIMG()">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" style="margin-left: 10px"> Ảnh hiển thị : </label>
                                    <div id="viewImg">
                                        <img width="100px" src="{{asset('')}}assets/img_other_service/{{$other_service ->image}}">
                                    </div>
                                </div>

                                {{-- tag --}}
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Tags</label>
                                        <input data-role='tags-input' value="{{$str_tags}}" name="tags">
                                    </div>
                                </div>
                                {{-- endtag --}}
                                {{--Tiêu điểm --}}
                                <div class="form-group">
                                    <label>Hiển thị</label>
                                    <label class="radio-inline">
                                        <input name="active" value="1" checked="" type="radio">Có
                                    </label>
                                    <label class="radio-inline">
                                        <input name="active" value="0" type="radio">Không
                                    </label>
                                </div>
                                {{--Hết tiêu điểm--}}
                                {{--Nổi bật--}}
                                <div class="form-group">
                                    <label>Nổi bật</label>
                                    <label class="radio-inline">
                                        <input name="footer_hot" value="1" checked="" type="radio">Có
                                    </label>
                                    <label class="radio-inline">
                                        <input name="footer_hot" value="0" type="radio">Không
                                    </label>
                                </div>
                                {{--Hết nối bật--}}

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
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


@endsection
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

