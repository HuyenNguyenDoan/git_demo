@extends('layout.index')

@section('title')

     Liên Hệ
@endsection
@section('css')
   <link rel="stylesheet" href="css/feedback.css"/>
@endsection


@section('content')
                                <div class="hearder1">
                                    <h4>Liên Hệ</h4>
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
   
                                <form id="frm-feedback" action="lienhe" method="post">

                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <div class="form-group">
                                            <label>Họ và Tên</label>
                                            <input type="text" class="form-control" name="ten" placeholder=" Họ và tên không được để trống">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Số Điện Thoại</label>
                                            <input type="text" class="form-control" placeholder="  Số điện thoại không được để trống bắt đầu là số 0 từ 10 đến 11 số " name="dienthoai">

                                        </div>
                                    
                                        
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" placeholder=" Email không được để trống" name="email">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Nội Dung liên hệ</label>
                                            <textarea class="form-control" rows="8" name="noidung">

                                             </textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Địa Chỉ</label>
                                            <input type="text" class="form-control" name="diachi" placeholder=" Địa chỉ không được để trống">
                                        </div>

                                       
                                        <button type="submit" class="btn btn-primary">Liên Hệ</button>
                                </form> 

  @endsection                                                          