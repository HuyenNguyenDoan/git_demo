 @extends('admin.layouts.index')

@section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".add").click(function(){
                            return confirm('Bạn có chắc muốn thêm mới Tin Tức ?');
                   });
             });
       </script>
  @endsection
@section('content')
 <div class="col-md-9  content"> 
                    <div class="frm_edit">

                     <div class="title table">
                         <h2>Thêm Tin Tức</h2>
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
                       <form action="admin/tintuc/them" method="post" accept-charset="utf-8" 
                        enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                           <label>Tiêu Đề Tin</label>
                           <input type="text" class="form-control" name="tieude" placeholder="Nhập Tiêu Đề....">
                        </div>
                         <div class="form-group">
                           <label for="demo">Nội Dung Tin</label>
                            <textarea name="noidung" id="demo" rows="6"
                             class="form-control ckeditor">
                              
                            </textarea>
                        </div>
                         <div class="form-group">
                           <label>Hình Ảnh</label>
                           <input type="file" class="form-control" name="hinh[]" width="100px" height="100px">
                        </div>
                         <div class="form-group">
                           <label>Nổi Bật</label>
                           <label class="radio-inline"> 
                           <input type="radio" name="hotnew" value="1">Tin nổi bật
                           </label>

                           <label class="radio-inline"> 
                           <input type="radio" name="hotnew" value="0" checked="">Tin thường
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