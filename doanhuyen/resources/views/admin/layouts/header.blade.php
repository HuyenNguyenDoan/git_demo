 <div class="row one">
                    <div class="col-md-4 title">
                       <h2>Quản Lý Hệ Thống</h2>
                    </div>
                 
                 <div class="col-md-8  login"> 
                        
                    <div class="dropdown pull-right">
                        <a data-toggle="dropdown" href="">
                        <span class="glyphicon glyphicon-user"></span>
                        <span class="caret"></span></a>


                        <ul class="dropdown-menu">
                            @if(Auth::user()) 
                              <li><a href="">
                                 {{Auth::user()->name}}
                              </a></li>
                             
                              <li><a href="admin/dangxuat">Logout</a></li>
                            
                            @endif
                        </ul>
                    </div>
                  </div>

</div> 