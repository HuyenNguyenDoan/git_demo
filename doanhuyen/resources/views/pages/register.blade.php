@extends('layout.index')


@section('css')

   <link rel="stylesheet" href="css/register.css"/>
@endsection

@section('title')
   Đăng Ký
@endsection
@section('content')
<div class="hearder1">
                                    <h4>Đăng Ký tài Khoản</h4>
                                </div>
                                
                                
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

                                   <div id="slogan-register">

                                    <p> 
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        Hãy đăng ký là thành viên của <b><i>ĐỒ GỖ THỊNH GIA</i></b> để nhận ưu đãi khi mua và đặt hàng,
                                        liên tục nhận tin khuyến mại các sản phẩm mới nhất.
                                    </p>
                                 </div>
                                
                                <form id="frm-register" action="{{url('/register')}}" method="post">

                                  <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                                       <div class="form-group">
                                            <label>Họ và Tên </label>
                                            <input type="text" class="form-control" name="name" placeholder="Nhập Họ và Tên...." >
                                        </div>
                                         

                                          <div class="form-group">
                                            <label>Email *</label>
                                            <input type="text" class="form-control" name="email" placeholder="Nhập Email...">
                                        </div> 


                                          <div class="form-group">
                                            <label>Mật Khẩu *</label>
                                            <input type="password" class="form-control" name="password" placeholder="Nhập Mật Khẩu">
                                        </div>

                                        <div class="form-group">
                                            <label>Nhập Lại Mật Khẩu *</label>
                                           
				                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Nhập lại Mật Khẩu .. .">				      </div>                      
                                         <div class="form-group">
                                                <label for="level" class="col-md-4 control-label"></label>
                                              <label class="radio-inline">
                                               <input  hidden="" type="radio" name="level" value="1" 
                                                 > 
                                           </label>
                                            <label class="radio-inline">
                                            <input type="radio" name="level" value="0" 
                                           
                                                  checked="" readonly="" hidden=""> 
                                           </label> 
                                            </div>
                                        
                                       <button type="submit" class="btn btn-info">Đăng Ký</button>
                                        
                                </form>

@endsection