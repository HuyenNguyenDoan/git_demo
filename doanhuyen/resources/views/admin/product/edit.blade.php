 @extends('admin.layouts.index')
 @section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".edit").click(function(){
                            return confirm('Bạn có chắc muốn thêm mới danh mục ?');
                   });
             });
       </script>
  @endsection
 @section('content')
  <div class="col-md-9  content"> 
                      <div class="frm_edit">
                          <div class="title table">

                         <h2>Sửa Sản Phẩm</h2>
                         <p>{{$product->name}}</p>
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
                       <form action="admin/sanpham/sua/{{$product->id}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                       <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                           <label>Tên Sản Phẩm </label>
                           <input type="text"  name="ten" class="form-control" placeholder="Nhập Tên Sản Phẩm..." value="{{$product->name}}">
                        </div>
                         <div class="form-group">
                           <label>Giá Sản Phẩm </label>
                           <input type="text" class="form-control" name="gia" placeholder="Nhập giá sản phẩm..." value="{{$product->price}}">
                        </div>
                         <div class="form-group">
                           <label>Số lượt view </label>
                           <input type="text" class="form-control" name="luotxem"   placeholder="Lượt view" value="{{$product->view}}">
                        </div>
                         <div class="form-group">
                           <label>Hình Ảnh  </label>
                           <p>
                             <img  width="70px" height="70px" src="uploads/product/{{$product->images}}" alt="">
                           </p>
                          <input type="file"  name="hinh" width="50px" height="40px" class="form-control" >
                        </div>

                         <div class="form-group">
                           <label>Danh Mục</label>
                           <select  class="form-control"  name="danhmuc">
                           @foreach($category as $cate)
                                  <option 
                                     @if($product->Category->id == $cate->id)
                                           {{"selected"}}
                                     @endif

                                  value="{{$cate->id}}">{{$cate->name}}

                                  </option>

                           @endforeach
                           </select>
                        </div>

                         <div class="form-group">
                           <label>Loại Gỗ </label>
                           <select class="form-control"  name="loaigo">
                             @foreach($typewood as $tw)

                                 <option
                                    @if($product->Type_of_wood->id == $tw->id)
                                      {{"selected"}}
                                    @endif
                                  value="{{$tw->id}}">{{$tw->name}}

                                  </option>
                             @endforeach
                           </select>
                        </div>

                         <div class="form-group">
                            <label for="mota">Mô Tả</label>
                             <textarea name="mota" id="mota" rows="5" class="form-control">
                               {{$product->description}}
                             </textarea>
                         </div>
                         <div class="form-group">
                           <label>Số Lượng </label>
                           <input type="text" class="form-control" name="soluong"  placeholder="Số lượng..." value="{{$product->quantity}}">
                        </div>

                         <div class="form-group">
                           <label>Nổi Bật </label>
                            <label class="radio-inline">
                             <input type="radio" name="hotpro" value="1"
                                @if($product->hot_product==1)
                                   {{'checked'}}
                                   
                                @endif
                                >Có
                            </label>

                             <label class="radio-inline">
                             <input type="radio" name="hotpro" value="0" 
                                 @if($product->hot_product==0)
                                   {{'checked'}}
                                
                                @endif
                              
                             >Không
                            </label>
                        </div>
                          <br/>
                         
                          <button type="submit" class="btn btn-info edit">Sửa</button>
                          <button type="submit" class="btn btn-primary">làm Mới</button>
                       </form>
                      </div>
  

       <!-- comments -->

           <div class="title table">
                         <h2>Danh sách Bình Luận</h2>
                     </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Người Dùng</th>
                                <th>Nội Dung</th>
                                <th>Ngày Viết</th>
                                <th>Xóa</th>

                            </tr>
                        </thead>
                        <tbody>
                          @foreach($product->Comment as $cm)
                            <tr>
                                <td>{{$cm->id}}</td>
                                <td>{{$cm->User->name}}</td>
                                <td>
                                  {{$cm->content}}
                                </td>

                                <td>
                                     {{$cm->created_at}}
                                </td>
                                <td>
                                    <a href="admin/binhluan/xoa/{{$cm->id}}/{{$product->id}}" title="">Xóa</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                   </table>


                  

 </div>

 @endsection