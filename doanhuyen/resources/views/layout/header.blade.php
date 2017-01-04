 <div class="row one">
                <div class="col-md-6 phone">
                    <p>Tư Vấn & Hỗ Trợ <span class="glyphicon glyphicon-earphone"></span> : 0986 003 622</p>
                </div>
                <div class="col-md-6 login">
                    <ul class="nav navbar-nav">

                      @if(Auth::user())
                        <li>
                         <a href="nguoidung">
                         <span class="glyphicon glyphicon-user"></span>{{Auth::user()->name}}</a>
                        </li>
                         <li><a href="dangxuat">Đăng Xuất</a></li>
                        
                      @else 
                          
                          <li><a href="dangnhap">Đăng Nhập</a></li>
                         <li><a href="dangky">Đăng Ký</a></li>
                      @endif

                    </ul>
                </div>
            </div>
            <div class="row two">
                <div class="col-md-6 logo">
                    
                            <a href="trangchu">
                                <img src="images/logo/logo.png"/> 
                               <h4>ĐỒ GỖ THỊNH GIA</h4>
                            </a>
                       
                    </ul>
                </div>
                <div class="col-md-6 slogan">
                      
                        <ul>
                            <li>
                                <img src="images/logo/slogan1.png" class="img-slogan"/>
                                <br/>
                                <span>Uy Tín Chất Lượng</span>
                            </li>
                             <li>
                                <img src="images/logo/slogan2.png" class="img-slogan" />
                                 <br/>
                                <span>Chất liệu Tự Nhiên</span>
                            </li>
                             <li>
                                <img src="images/logo/slogan.png" class="img-slogan"/>
                                <br/>
                                <span>Mẫu Mã Sáng Tạo</span>
                            </li>
                        </ul>
                   
                    
                </div>
            </div>
                 <nav class="navbar navbar-inverse navbar-static-top">
                         <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                            </div>
                            <!-- Nav collapse -->
                            <div class="collapse navbar-collapse" id="menu">
                                <ul class="nav navbar-nav">
                                    <li>
                                        <a href="trangchu">Trang Chủ</a>
                                    </li>
                                    <li>
                                        <a href="#">  Giới Thiệu</a>
                                    </li>
                                    <li>
                                        <a href="tintuc">Tin Tức</a>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" href="#" style="background-color:#df7044">Sản Phẩm<span class="caret"></span></a>
                                         <ul class="dropdown-menu" style="background-color: #df7044">

                                                    @foreach($category as $cate)
                                                    <li>
                                                        <a href="loaisanpham/{{$cate->id}}">
                                                           {{$cate->name}}
                                                        </a>
                                                    </li>
                                                    @endforeach 


                                                </ul>
                                    </li>
                                    <li>
                                        <a href="lienhe">  Liên Hệ</a>
                                    </li>
                                </ul>
                                <div class="pull-right">
                                    <ul class="nav navbar-nav ">
                                        <li>  
                                                 <a href="giohang" style="margin-left: -12%;">

                                                    Giỏ Hàng <?php echo Cart::content()->count();?>
                                                   </a>
                                           
                                        </li>
                                    </ul>
                                </div>
                            
                        </div>
           </nav>
    
              <div class="row three">
                  <div class="col-md-3 title-search">
                      <p>Nhập Tên Sản phẩm Bạn Cần Tìm</p>
                  </div>
                  <div class="col-md-9 frm-search" >
                      <form class="form-inline" action="timkiem" method="post">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          <input type="text"  name="timkiem" class="form-control" placeholder="Nhập Tên sản Phẩm Bạn Muốn Tìm...">
                          <button type="submit" class="btn btn-danger">Tìm Kiếm</button>
                      </form>
                  </div>     
              </div>