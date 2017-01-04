 @extends('admin.layouts.index')

@section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".add").click(function(){
                            return confirm('Bạn có chắc muốn thêm mới danh mục Loại gỗ  ?');
                   });
             });
       </script>
  @endsection
@section('content')
 <div class="col-md-9  content"> 
                    <div class="frm_edit">

                      <div class="title table">
                         <h2>Thêm Loại Gỗ</h2>
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
                       <form action="admin/loaigo/them" method="post" accept-charset="utf-8">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                         <div class="form-group">
                           <label>Tên Loại Gỗ</label>
                           <input type="text" name="ten" class="form-control" placeholder="Nhập tên Loại gỗ...">
                        </div>
                         <div class="form-group">
                            <label>Nổi Bật &nbsp; </label>

                           <label class="radio-inline">
                               <input type="radio" name="hottype" value="1" > có
                           </label>

                           <label class="radio-inline">
                            <input type="radio" name="hottype" value="0" checked="" > không
                           </label>
                            
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