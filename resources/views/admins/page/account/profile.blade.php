@extends('admins.layout.master-layout')
@section('title')
    Chỉnh sửa tài khoản khách hàng
@endsection
@section('content')

    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">Nina Mcintire</h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            @if ( Session::has('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Danh sách admin</a></li>
              <li><a href="#timeline" data-toggle="tab">Thêm admin</a></li>
              <li><a href="#client" data-toggle="tab">Danh sách client</a></li>
              <li><a href="#add_client" data-toggle="tab">Thêm client</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                    <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Chức năng</th>
                                        <th>Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($editor))
                                        @foreach($editor as $value )
                                            <tr class="gradeX">
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->phone }}</td>
                                                <td>{{ $value->name_level }}</td>
                                                <td >
                                                    <a class="btn btn-default" href="{{Route('editor.account.edit',['id'=> $value->id]) }}" title="Edit this user account"><i class="fas fa-pencil-ruler"></i> Sửa</a>
                                                    
                                                    <a href="{{ Route('editor.account.delete',['id' => $value->id]) }}" class="btn btn-danger" title="Xóa {{ $value->name }}" onclick="return confirm('Bạn muốn xoá tài khoản này ?')"><i class="fa fa-trash"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>


                                </table>
                            </div>
                
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <div class="table-responsive">
                    <form name="create" action="{{ Route('editor.account.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <p>Tên</p>
                            <input name="name" class="form-control" type="text" placeholder="Tên" value="{{ old('name') }}">
                            <p style="color:red">{{ $errors->first('name') }}</p>
                        </div>
                         <div class="form-group">
                            <p>Số điện thoại</p>
                            <input name="phone" class="form-control" type="tel" placeholder="Số điện thoại" value="{{ old('phone') }}">
                            <p style="color:red">{{ $errors->first('phone') }}</p>
                        </div>
                        <div class="form-group">
                            <p>Email</p>
                            <input name="email" class="form-control" type="email" placeholder="Email" value="{{ old('email') }}" />
                            <p style="color:red">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group">
                            <p>Cấp bậc</p>
                            <select name="level">
                                @foreach($roles['role'] as $value )
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Mật khẩu</p>
                            <input name="password" class="form-control" id="pass" type="password" placeholder="Password" onchange="return lengthPasswword()">
                            <p style="color:red">{{ $errors->first('password') }}</p>
                            <div id="lengthpass" style="color:red"></div>
                        </div>
                        <div class="form-group">
                            <p>Nhập lại mật khẩu</p>
                            <input name="password_confirmation" class="form-control" id="confirmpass" type="password" placeholder="Confirm password" onchange="return confirmPasswword()">
                            <p style="color:red">{{ $errors->first('password_confirmation') }}</p>
                            <div id="errorpass" style="color:red"></div>
                        </div>

                        <div class="form-group">
                            <a class="btn btn-primary" href="{{ Route('editor.account.profile') }}" type="submit" title="Cancel">Hủy</a>
                            <input name="submit" class="btn btn-success" type="submit" value="Tạo" >
                        </div>

                    </form>
                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="client">
                <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Hành Động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($clients))
                                        @foreach($clients['client'] as $value )
                                            <tr class="gradeX">
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->phone }}</td>
                                                <td >
                                                    <a class="btn btn-default" href="{{Route('user.account.edit',['id'=> $value->id]) }}" title="Edit this user account"><i class="fas fa-pencil-ruler"></i> Sửa</a>
                                                    
                                                    <a href="{{ Route('user.account.delete',['id' => $value->id]) }}" class="btn btn-danger" title="Xóa {{ $value->name }}" onclick="return confirm('Bạn muốn xoá tài khoản này ?')"><i class="fa fa-trash"></i> Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>


                                </table>
                            </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="add_client">
               <div class="table-responsive">
                    <form name="create" action="{{ Route('user.account.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <p>Tên</p>
                            <input name="name" class="form-control" type="text" placeholder="Tên" value="{{ old('name') }}">
                            <p style="color:red">{{ $errors->first('name') }}</p>
                        </div>
                         <div class="form-group">
                            <p>Số điện thoại</p>
                            <input name="phone" class="form-control" type="tel" placeholder="Số điện thoại" value="{{ old('phone') }}">
                            <p style="color:red">{{ $errors->first('phone') }}</p>
                        </div>
                        <div class="form-group">
                            <p>Email</p>
                            <input name="email" class="form-control" type="email" placeholder="Email" value="{{ old('email') }}" />
                            <p style="color:red">{{ $errors->first('email') }}</p>
                        </div>
                        <div class="form-group">
                            <p>Mật khẩu</p>
                            <input name="password" class="form-control" id="pass" type="password" placeholder="Password" onchange="return lengthPasswword()">
                            <p style="color:red">{{ $errors->first('password') }}</p>
                            <div id="lengthpass" style="color:red"></div>
                        </div>
                        <div class="form-group">
                            <p>Nhập lại mật khẩu</p>
                            <input name="password_confirmation" class="form-control" id="confirmpass" type="password" placeholder="Confirm password" onchange="return confirmPasswword()">
                            <p style="color:red">{{ $errors->first('password_confirmation') }}</p>
                            <div id="errorpass" style="color:red"></div>
                        </div>

                        <div class="form-group">
                            <a class="btn btn-primary" href="{{ Route('editor.account.profile') }}" type="submit" title="Cancel">Hủy</a>
                            <input name="submit" class="btn btn-success" type="submit" value="Tạo" >
                        </div>

                    </form>
                </div>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <

@endsection