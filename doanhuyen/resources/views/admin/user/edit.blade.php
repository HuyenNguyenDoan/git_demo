 @extends('admin.layouts.index')
 @section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".edit").click(function(){
                            return confirm('Bạn có chắc muốn Sửa người Này ?');
                   });
             });
       </script>
  @endsection
 @section('content')
  <div class="col-md-9  content"> 
                      <div class="frm_edit">
                            <div class="title table">
                         <h2>Sửa Người Dùng {{$user->name}}</h2>
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
                       <form action="admin/nguoidung/sua/{{$user->id}}" method="post" accept-charset="utf-8">

                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="form-group">
                           <label>Họ tên </label>
                           <input type="text"  name="name" value="{{$user->name}}" class="form-control" placeholder="Họ tên....">
                        </div>
                         <div class="form-group">
                           <label>Email </label>
                           <input type="text" name="email" class="form-control" placeholder="Email..." value="{{$user->email}}">
                        </div>
                         <div class="form-group">
                           <label> Mật Khẩu </label>
                           <input type="text"  name="password" class="form-control" placeholder="Mật Khẩu..." value="{{$user->password}}" disabled="">
                        </div>
                         <div class="form-group">
                           <label>Level </label>
                            
                              <label class="radio-inline">
                               <input type="radio" name="level" value="1"
                                  @if($user->level == 1)
                                   {{'checked'}}
                                  @endif
                                 > admin
                           </label>

                           <label class="radio-inline">
                            <input type="radio" name="level" value="0" 
                             @if($user->level == 0)
                                   {{'checked'}}
                                  @endif> thường
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