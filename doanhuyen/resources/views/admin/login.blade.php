<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
    <base href="{{asset('')}}" >
	 <link type="text/css" href="admin-asset/css/bootstrap.min.css" rel="stylesheet"/>
        <link type="text/css" href="admin-asset/css/style.css" rel="stylesheet"/>
        <script type="text/javascript" src="admin-asset/js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="admin-asset/js/bootstrap.min.js"></script>

</head>
<body>
	
        
	   <div class="frm_login">

	      <h2>Đăng Nhập</h2>

              @if(count($errors) > 0)

                     <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}} <br/>
                                @endforeach
                            </div>
                        @endif
                         
                      @if(session('thongbao'))
                           <div class="alert alert-danger">
                             {{session('thongbao')}}
                           </div>

                        @endif
	   	  <form action="admin/dangnhap" method="post" role="form" accept-charset="utf-8">

            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
	   	     <div class="form-group">

            <label>Email</label>
            <input type="text"  name="email" class="form-control" placeholder="Email">
              </div>
          <div class="form-group">
            <label>Mật Khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Mật Khẩu">
           </div>
        
           <button type="submit" class="btn btn-primary">Đăng Nhập</button>
	   	  </form>
	   </div>
</body>
</html>