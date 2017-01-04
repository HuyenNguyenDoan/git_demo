@extends('layout.index')


@section('css')

   <link rel="stylesheet" href="css/register.css"/>
@endsection

@section('title')
   Thông Tin Người Dùng
@endsection
@section('content')
<div class="hearder1">
                                    <h4>Thông Tin Người Dùng</h4>
                                </div>
                                
                                <div id="slogan-register">
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
                                 </div>
                                
                                <form id="frm-register" action="nguoidung" method="post">

                                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <div class="form-group">
                                            <label>Họ và Tên</label>
                                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                                        </div>
                                         

                                          <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" readonly="" value="{{Auth::user()->email}}">
                                        </div> 


                                        <div class="form-group">
                                            <label>Đổi Mật Khẩu</label>
                                            <input type="password" class="form-control" name="password" value="{{Auth::user()->password}}">
                                        </div>

                                         <div class="form-group">
                                            <label>Nhập Lại Mật Khẩu</label>
                                           
				                                <input id="password-confirm" type="password" class="form-control" name="password_again" required>
				                            
                                        </div>
                                     
                                       <button type="submit" class="btn btn-info">Sửa</button>
                                        
                                </form>

@endsection