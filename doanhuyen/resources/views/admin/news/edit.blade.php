 @extends('admin.layouts.index')
 @section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".edit").click(function(){
                            return confirm('Bạn có chắc muốn sửa tin tức này không?');
                   });
             });
       </script>
  @endsection
 @section('content')
  <div class="col-md-9  content"> 
                      <div class="frm_edit">
                          
                     <div class="title table">
                         <h2>Sửa Tin Tức {{$new->title}}</h2>
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
                       <form action="admin/tintuc/sua/{{$new->id}}" method="post" accept-charset="utf-8" 
                        enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                           <label>Tiêu Đề Tin</label>
                           <input type="text" class="form-control" name="tieude" placeholder="Nhập Tiêu Đề...." value="{{$new->title}}">
                        </div>
                         <div class="form-group">
                           <label for="demo">Nội Dung Tin</label>
                            <textarea name="noidung" id="demo" rows="6"
                             class="form-control ckeditor">
                             {{$new->content}}
                            </textarea>
                        </div>
                         <div class="form-group">
                           <label>Hình Ảnh</label>
                             <p>
                               <img src="uploads/news/{{$new->images}}" alt="" width="100px" height="100px">
                             </p>
                           <input type="file" class="form-control" name="hinh" width="100px" height="100px">
                        </div>
                         <div class="form-group">
                           <label>Nổi Bật</label>
                           <label class="radio-inline"> 
                           <input type="radio" name="hotnew" value="1"

                            @if($new->hot_news==1)
                               {{'checked'}}
                            @endif
                            >Tin nổi bật

                           </label>

                           <label class="radio-inline"> 
                           <input type="radio" name="hotnew" value="0" 
                             @if($new->hot_news==0)
                               {{'checked'}}
                            @endif>Tin thường
                           </label>
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