 @extends('admin.layouts.index')
@section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".add").click(function(){
                            return confirm('Bạn có chắc muốn thêm mới slide ?');
                   });
             });
       </script>
  @endsection

@section('content')
 <div class="col-md-9  content"> 
                    <div class="frm_edit">

                     <div class="title table">
                         <h2>Thêm Slides</h2>
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

                       <form action="admin/slide/them" method="post" accept-charset="utf-8"
                       enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                           <label>Tiêu Đề </label>
                           <input type="text" class="form-control" name="tieude" placeholder="Nhập Tiêu Đề....">
                        </div>
                         <div class="form-group">
                           <label>Hình Ảnh </label>
                           <input type="file" class="form-control"  name="hinh" width="180px" height="100px">
                        </div>
                         <div class="form-group">
                           <label>link</label>
                           <input type="text" class="form-control" name="link" placeholder="Nhập link...">
                        </div>
                         
                          <br/>
                          <br/>
                          <br/>
                          <button type="submit" class="btn btn-info add">Thêm</button>
                          <button type="submit" class="btn btn-primary">làm Mới</button>
                       </form>
                   </div>

  </div>
 @endsection