 @extends('admin.layouts.index')
 @section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".edit").click(function(){
                            return confirm('Bạn có chắc muốn sửa hình ảnh này ?');
                   });
             });
       </script>
  @endsection
 @section('content')
  <div class="col-md-9  content"> 
                      <div class="frm_edit">
                            <div class="title table">
                         <h2>Sửa hình ảnh mã số {{$image->id}}</h2>
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

                       <form action="admin/hinhanh/sua/{{$image->id}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                      
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                         <div class="form-group">
                           <label>Hình Ảnh </label>
                             <img src="uploads/product/{{$image->images}}" alt="" width="180px" height="100px">
                           <input type="file" class="form-control"  name="hinh" width="180px" height="100px">
                        </div>
                         <div class="form-group">
                           <label>Hình ảnh cho sản phẩm</label>
                           <select  class="form-control"  name="hinhanhsp">
                           @foreach($product as $pr)
                                  <option 
                                     @if($image->product->id == $pr->id)
                                           {{"selected"}}
                                     @endif

                                  value="{{$pr->id}}">{{$pr->name}}

                                  </option>

                           @endforeach
                           </select>
                        </div> 
                          <br/>
                          <br/>
                          <br/>
                          <button type="submit" class="btn btn-info edit">Sửa</button>
                          <button type="submit" class="btn btn-primary">làm Mới</button>
                       </form>
                      </div>
 </div>

 @endsection