 @extends('admin.layouts.index')

@section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".add").click(function(){
                            return confirm('Bạn có chắc muốn thêm mới sản phẩm ?');
                   });
             });
       </script>
  @endsection
@section('content')
 <div class="col-md-9  content"> 
                    <div class="frm_edit">

                     <div class="title table">
                         <h2>Thêm Sản Phẩm</h2>
                     </div>
                         @if(count($errors) > 0 )
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                   {{$err}}<br/>
                                @endforeach
                            </div>
                         @endif
                            @if(session('loi'))
                           <div class="alert alert-success">
                             {{session('loi')}}
                           </div>

                          @endif
                          
                         @if(session('thongbao'))
                           <div class="alert alert-success">
                               {{session('thongbao')}}
                           </div>
                         @endif
                       <form action="admin/sanpham/them" method="post" accept-charset="utf-8"
                        enctype="multipart/form-data">
                       <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                           <label>Tên Sản Phẩm </label>
                           <input type="text"  name="ten" class="form-control" placeholder="Nhập Tên Sản Phẩm...">
                        </div>
                         <div class="form-group">
                           <label>Giá Sản Phẩm </label>
                           <input type="text" class="form-control" name="gia" placeholder="Nhập giá sản phẩm...">
                        </div>
                         <div class="form-group">
                           <label>Số lượt view </label>
                           <input type="text" class="form-control" name="luotxem"   placeholder="Lượt view">
                        </div>
                         <div class="form-group">
                           <label>Hình Ảnh  </label>
                          <input type="file"  name="hinh" width="50px" height="40px" class="form-control" >
                        </div>

                         <div class="form-group">
                           <label>Danh Mục</label>
                           <select  class="form-control"  name="danhmuc">
                            
                              @foreach($category as $cate)
                                
                                  <option value="{{$cate->id}}">{{$cate->name}}</option>
                             @endforeach
                           </select>
                        </div>

                         <div class="form-group">
                           <label>Loại Gỗ </label>
                           <select class="form-control"  name="loaigo">
                             
                                @foreach($typewood as $tw)
                                 <option value="{{$tw->id}}">{{$tw->name}}</option>
                                @endforeach
                           </select>
                        </div>

                         <div class="form-group">
                            <label for="mota">Mô Tả</label>
                             <textarea name="mota" id="mota" rows="5" class="form-control"></textarea>
                         </div>
                         <div class="form-group">
                           <label>Số Lượng </label>
                           <input type="text" class="form-control" name="soluong"  placeholder="Số lượng...">
                        </div>

                         <div class="form-group">
                           <label>Nổi Bật </label>
                            <label class="radio-inline">
                             <input type="radio" name="hotpro" value="1">Có
                            </label>

                             <label class="radio-inline">
                             <input type="radio" name="hotpro" value="0" checked="">Không
                            </label>
                        </div>
                          <br/>
                         
                          <button type="submit" class="btn btn-info add">Thêm</button>
                          <button type="submit" class="btn btn-primary">làm Mới</button>
                       </form>
                   </div>

  </div>
 @endsection