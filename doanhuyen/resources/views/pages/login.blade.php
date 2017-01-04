 @extends('layout.index')

@section('title')
  Đăng Nhập
@endsection

@section('css')
<link rel="stylesheet" href="css/login.css"/>
@endsection


@section('content')

                              <div class="hearder1">
                                    <h4>Đăng Nhập Tài Khoản</h4>
                                </div>
                                <br/>
                                <br/>
                                <br/>
                                  @if(count($errors) > 0)

                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}} <br/>
                                @endforeach
                            </div>
                        @endif
                         
                        @if(session('thongbao'))
                           <div class="alert alert-success">
                             {{session('thongbao')}}
                           </div>

                        @endif
                                
                                <form id="frm-register" action="dangnhap" method="post">

                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" placeholder="Email  không được để trống" name="email">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Mật Khẩu</label>
                                            <input type="password" class="form-control" placeholder="  Mật khẩu không được để trống" name="password">
                                        </div>

                         <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                                </form>


  @endsection
                              