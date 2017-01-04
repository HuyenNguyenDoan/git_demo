<!-- giao dien chinh cua trang admin -->
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hệ Thống Quản Lý</title>
         <base href="{{asset('')}}">
        <link type="text/css" href="admin-asset/css/bootstrap.min.css" rel="stylesheet"/>
        <link type="text/css" href="admin-asset/css/style.css" rel="stylesheet"/>
       
        <script type="text/javascript" src="admin-asset/js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="admin-asset/js/bootstrap.min.js"></script>
       <script type="text/javascript" src="admin-asset/js/js.js"></script>
       <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
         @yield('css');
       
	</head>
	<body>
        <div class="container">


            @include('admin.layouts.header')
         

            <div class="row two">
                
               
                @include('admin.layouts.left-menu')
               
                @yield('content')
                
                
            </div>
    
              @include('admin.layouts.footer') 
        </div>

        @yield('script')
	</body>
</html>
