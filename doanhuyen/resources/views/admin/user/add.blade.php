 @extends('admin.layouts.index')
@section('css')
       <script type="text/javascript">
             $(document).ready(function(){
                   $(".add").click(function(){
                            return confirm('Bạn có chắc muốn thêm người mới ?');
                   });
             });
       </script>
  @endsection

@section('content')
 <div class="col-md-9  content"> 
                    <div class="frm_edit">

                     <div class="title table">
                         <h2>Thêm Người Dùng</h2>
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
                        <!-- {{url('/register')}}"> -->
                        <form role="form" method="POST" action="{{url('/register')}}">
                        
                           <input type="hidden" name="_token" value="{{csrf_token()}}">

                          <div class="form-group">
                            <label for="name" control-label">Họ Tên</label>
                        
                                <input id="name" type="text" class="form-control" name="name" required>
                              </div>

                        <div class="form-group">
                            <label for="email" >E-Mail </label>

                          
                                <input id="email" type="email" class="form-control" name="email"  >
                        </div>

                        <div class="form-group">
                            <label for="password" >Mật Khẩu</label>
                          
                                <input id="password" type="password" class="form-control" name="password" required>       
                    

                        <div class="form-group">
                            <label for="password-confirm">Nhập Lại Mật Khẩu</label>

                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        
                        </div>
                        <div class="form-group">
                            <label for="level" class="col-md-4 control-label">Level</label>
                              <label class="radio-inline">
                               <input type="radio" name="level" value="1"
                                 > admin
                              </label>

                              <label class="radio-inline">
                               <input type="radio" name="level" value="0" 
                           
                                  checked=""> thường
                              </label>
                               
                              </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary add">
                                    Thêm
                                </button>
                            </div>
                        </div>
                    </form>
                   </div>

  </div>
 @endsection