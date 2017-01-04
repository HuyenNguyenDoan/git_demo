 @extends('admin.layouts.index')
 
 @section('content')
  <div class="col-md-9  content"> 
                      <div class="frm_edit">
                           <div class="title table">
                               <h2>Sửa Khách Hàng </h2>
                               <small></small>
                           </div>   

                       @if(count($errors) > 0)

                           <div class="alert alert-danger">
                               @foreach($errors->all() as $err)
                               {{$err}}<br/>
                               @endforeach
                           </div>
                       @endif

                       @if(session('thongbao'))
                         <div class="alert alert-success">
                             {{session('thongbao')}}
                         </div>
                       @endif
                          <form action="admin/khachhang/sua/{{$customer->id}}" method="post" accept-charset="utf-8">

                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                         <div class="form-group">
                           <label>Họ Tên</label>
                           <input type="text" name="ten" value="{{$customer->fullname}}" class="form-control" >
                        </div>
                        

                           <div class="form-group">
                           <label>Số Điện Thoại</label>
                           <input type="text" name="dienthoai" class="form-control" placeholder="Số điện thoại..." value="{{$customer->phone_number}}">
                        </div>

                        

                        <div class="form-group">
                           <label>Địa Chỉ</label>
                           <input type="text" name="diachi" class="form-control" placeholder="Địa Chỉ..." value="{{$customer->address}}">
                        </div>
                          <br/>
                          <br/>
                          <br/>
                          <button type="submit" class="btn btn-info">Sửa</button>
                          <button type="submit" class="btn btn-primary">làm Mới</button>
                       </form>
                      </div>
 </div>

 @endsection