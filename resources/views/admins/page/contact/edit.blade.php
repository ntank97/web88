@extends('admins.layout.master-layout')
@section('title')
    Chỉnh sửa thông tin liên hệ
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
            <section class="content-header">
                <h1>
                        Chỉnh sửa tin liên hệ
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Chỉnh sửa tin liên hệ</li>
                </ol>
            </section>
            <br>
            <div class="box box-primary">
                <form role="form" method="POST" action="{{Route('contact.edit',['id'=>$contact->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                                    
                             <div class="form-group">
                            <label>Tên (*)</label>
                            <input type="text" class="form-control" placeholder="Nhập tên" name="title"
                                   value="{{$contact->title}}">
                            <p style="color:red">{{ $errors->first('title') }}</p>
                        </div>

                        <div class="form-group">
                            <label>Phone (*)</label>
                            <input type="tel" class="form-control" placeholder="Nhập số điện thoại" name="phone"
                                   value="{{$contact->phone}}">
                            <p style="color:red">{{ $errors->first('phone') }}</p>   
                        </div>
                        <div class="form-group">
                            <label>Email (*)</label>
                            <input type="email" class="form-control" placeholder="Nhập email" name="email"
                                   value="{{$contact->email}}">
                            <p style="color:red">{{ $errors->first('email') }}</p>   
                        </div>
                        <div class="form-group">
                            <label>Address (*)</label>
                            <input type="text" class="form-control" placeholder="Nhập address" name="address"
                                   value="{{$contact->address}}">
                            <p style="color:red">{{ $errors->first('address') }}</p>   
                        </div>

                         <div class="form-group">
                            <input type="checkbox" name="active" class="custom-control-input" id="defaultUnchecked">
                            <label class="custom-control-label" for="defaultUnchecked">Active</label>
                        </div>

                    <div class="box-footer">
                        <a href="{{route('contact.list')}}" class="btn btn-warning">Quay lại</a>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
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
    </div>
</div>

@endsection