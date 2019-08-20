@extends('admins.layout.master-layout')
@section('title')
    Sửa blogs
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <section class="content-header">
            <h1>
                Sửa blogs
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Sửa blogs</li>
            </ol>
        </section>
        <br>
        <div class="box box-primary">
            {{-- @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif --}}
            <form role="form" method="POST" action="{{Route('blogs.edit',['id'=>$blogs->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="box-body">

                     <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt tin tức (*)</label>
                            <textarea class="form-control" name="summary" cols="50" rows="10"
                                      placeholder="Nhập tóm tắt nội dung">{{ $blogs->summary }}</textarea>
                            <p style="color:red">{{ $errors->first('summary') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung (*)</label>
                            <textarea  name="detail" rows="10" placeholder="Nhập nội dung"
                                      class="form-control">{{ $blogs->detail }}</textarea>
                             <p style="color:red">{{ $errors->first('detail') }}</p>
                        </div>
                    <div class="form-group">
                        <input type="checkbox" name="active" class="custom-control-input" id="defaultUnchecked">
                        <label class="custom-control-label" for="defaultUnchecked">Active</label>
                    </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    
        <script>
            CKEDITOR.replace('contentt', {
                    filebrowserBrowseUrl: '{{asset("")}}ckfinder/ckfinder.html',
                    filebrowserImageBrowseUrl: '{{asset("")}}ckfinder/ckfinder.html?type=Images',
                    filebrowserFlashBrowseUrl: '{{asset("")}}ckfinder/ckfinder.html?type=Flash',
                    filebrowserUploadUrl: '{{asset("")}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                    filebrowserImageUploadUrl: '{{asset("")}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: '{{asset("")}}ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });

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
    </div>
</div>
@endsection