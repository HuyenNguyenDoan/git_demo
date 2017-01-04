 @extends('admin.layouts.index')
 @section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".edit").click(function(){
                            return confirm('Bạn có chắc muốn cập nhật lại hóa đơn này ?');
                   });
             });
       </script>
  @endsection
 @section('content')
  <div class="col-md-9  content"> 
                      <div class="frm_edit">
                           
                     <div class="title table">
                         <h2>Sửa Hóa Đơn Mã Số  {{$oder->id}}</h2>
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
                      <form action="admin/hoadon/sua/{{$oder->id}}" method="post" accept-charset="utf-8">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                          <div class="form-group">
                           <label>Mã Người DÙng</label>
                           <input type="text"  name="diachi" class="form-control" placeholder="Mã người dùng..." value="{{$oder->id_user}}" disabled="" ">
                        </div>                       
                        <div class="form-group">
                           <label>Địa Chỉ</label>
                           <input type="text"  name="diachi" class="form-control" placeholder="Địa Chỉ..." value="{{$oder->address}}" disabled="" ">
                        </div>

                        <div class="form-group">
                           <label>Thời gian đặt hàng</label>
                           <input type="text"  name="thoigian" class="form-control" placeholder="THời gian đặt hàng..." value="{{$oder->created_at}}" disabled="">
                        </div>
                        <div class="form-group">
                           <label>Trạng Thái</label>
                           <label class="radio-inline"> 
                           <input type="radio" name="status" value="0"

                            @if($oder->status==0)
                               {{'checked'}}
                            @endif
                            >Đang chờ xử lý

                           </label>

                           <label class="radio-inline"> 
                           <input type="radio" name="status" value="1" 
                            @if($oder->status==1)
                               {{'checked'}}
                            @endif
                            >Đang xử lý
                           </label>
                           <label class="radio-inline"> 
                           <input type="radio" name="status" value="2" 
                            @if($oder->status==2)
                               {{'checked'}}
                            @endif
                            >Đã giao hàng
                           </label>
                           <label class="radio-inline"> 
                           <input type="radio" name="status" value="3" 
                            @if($oder->status==3)
                               {{'checked'}}
                            @endif
                            >Hết Hàng
                           </label>
                           </div>
                          <br/>
                          <br/>
                          <br/>
                          <button type="submit" class="btn btn-info edit">Cập Nhật</button>
                          <button type="submit" class="btn btn-primary">làm Mới</button>
                       </form>
                      </div>
 </div>

 @endsection