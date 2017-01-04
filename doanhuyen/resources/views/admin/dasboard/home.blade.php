@extends('admin.layouts.index')
@section('css')
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/bar.css">
@endsection
@section('content')
              <div class="col-md-9  content"> 
                     <div class="title table">
                         <h2>Thống Kê 10 Hóa Đơn Người Dùng Đặt Hàng Gần Đây Nhất</h2>
                     </div>
                        @if(session('thongbao'))
                           <div class="alert alert-success">
                             {{session('thongbao')}}
                           </div>
                        @endif
                       
                        </div>
                            <div id="wrapper">
                                 <div class="chart">
                                    
                                    <table id="data-table" border="1" cellpadding="10" cellspacing="0"
                                    summary="Percentage of knowledge acquired during my experience
                                    for each technology or language.">
                                       <thead>
                                          <tr>
                                             <td>&nbsp;</td>
                                             <th scope="col"></th>
                                          </tr>
                                       </thead>
                                       <tbody>                                   
                                          <tr>
                                             <th scope="row">
                                                  {{$dtNow->toDateString()}}   
                                             </th>
                                             <td>
                                                <?php echo $co->count();?>
                                             </td>
                                          </tr>
                                          <tr>
                                             <th scope="row"> 
                                                 <?php echo  $ytd11;?> 
                                             </th>
                                             <td>
                                                   <?php echo $co1->count();?>
                                             </td>
                                          </tr>
                                          <tr>
                                             <th scope="row">
                                                  {{$ytd12}}   
                                             </th>
                                             <td>
                                                 <?php echo $co2->count();?>
                                             </td>
                                          </tr>
                                          <tr>
                                             <th scope="row">
                                                  {{$ytd13}} 
                                             </th>
                                             <td>
                                                  <?php echo $co3->count();?>
                                             </td>
                                          </tr>
                                          <tr ">
                                             <th scope="row" >
                                                 {{$ytd14}} 
                                             </th>
                                             <td>
                                                  <?php echo $co4->count();?>
                                             </td>
                                          </tr>
                                          <tr>
                                             <th scope="row">
                                                 {{$ytd15}}
                                             </th>
                                             <td>
                                                   <?php echo $co5->count();?>
                                             </td>
                                          </tr>
                                          <tr>
                                             <th scope="row">
                                                  {{$ytd16}}
                                             </th>
                                             <td>
                                                 <?php echo $co6->count();?>
                                             </td>
                                          </tr>
                                         <!--  <tr>
                                             <th scope="row"></th>
                                             <td>60</td>
                                          </tr>
                                          <tr>
                                             <th scope="row"></th>
                                             <td>90</td>
                                          </tr>
                                          <tr>
                                             <th scope="row"></th>
                                             <td>90</td>
                                          </tr> -->
                                       </tbody>
                                    </table>


                                 </div>
                                  <table class="table table-bordered">
                        <thead>
                            <tr>
                                 <th>No.</th>
                                <th>Mã Hóa Đơn</th>
                                <th>Mã NGười Dùng</th>
                                <th>Họ Tên</th>
                                <th>Địa Chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Tổng Tiền</th>
                                <th>Thời gian đặt Hàng</th>   
                                <th>Trạng Thái</th>                             
                                <th>Chi Tiết Hóa Đơn</th>
                            </tr>
                        </thead>
                        <tbody>      
                          @foreach($das as $key => $o)
                            <tr>
                               <td>{{$key  + 1}}</td>
                                <td>
                                {{$o->id}}
                                         
                                </td>
                                 <td>{{$o->id_user}}</td>                                
                                   <td>
                                      {{$o->name}}
                                   </td>
                                <td>
                                     {{$o->address}}
                                </td>
                                 <td>
                                     {{$o->phone_number}}
                                </td>
                                 <td style="color:red;">
<!--                                      {{$o->total_price}} -->
                                      {!!number_format($o->total_price)!!} VNĐ
                                </td>

                                <td>
                                     {{$o->created_at}}
                                </td>
                                <td style="color:green;">
                                   @if($o->status==0)
                                    {{'Đang chờ xử lý'}}
                                    @elseif($o->status==1)
                                     {{'Đang xử lý'}}
                                     @elseif($o->status==2)
                                     {{'Đã Giao Hàng'}}
                                     @elseif($o->status==3)
                                     {{'Hết Hàng'}}
                                   @endif
                                </td> 
                                <td>
                                    <a href="admin/hoadon/chitiethoadon/{{$o->id}}" title="Chi tiết Hóa Đơn">Chi Tiết Hóa Đơn</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                   </table>  
                              </div>
                          <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
                              <script src="js/graph.js"></script>
                              <script type="text/javascript">

                          var _gaq = _gaq || [];
                          _gaq.push(['_setAccount', 'UA-36251023-1']);
                          _gaq.push(['_setDomainName', 'jqueryscript.net']);
                          _gaq.push(['_trackPageview']);

                          (function() {
                            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                          })();

                        </script>
                   <!--  <table class="table table-bordered">
                        <thead>
                            <tr>
                                 <th>No.</th>
                                <th>Mã Hóa Đơn</th>
                                <th>Mã NGười Dùng</th>
                                <th>Họ Tên</th>
                                <th>Địa Chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Tổng Tiền</th>
                                <th>Thời gian đặt Hàng</th>   
                                <th>Trạng Thái</th>
                                <th>Cập Nhật Trạng Thái</th>                               
                                <th>Chi Tiết Hóa Đơn</th>
                            </tr>
                        </thead>
                        <tbody>      
                          @foreach($das as $key => $o)
                            <tr>
                               <td>{{$key  + 1}}</td>
                                <td>
                                {{$o->id}}
                                         
                                </td>
                                 <td>{{$o->id_user}}</td>                                
                                   <td>
                                      {{$o->name}}
                                   </td>
                                <td>
                                     {{$o->address}}
                                </td>
                                 <td>
                                     {{$o->phone_number}}
                                </td>
                                 <td style="color:red;">
                                     {{$o->total_price}} -->
                                     <!--  {!!number_format($o->total_price)!!} VNĐ
                                </td>

                                <td>
                                     {{$o->created_at}}
                                </td>
                                <td style="color:green;">
                                   @if($o->status==0)
                                    {{'Đang chờ xử lý'}}
                                    @elseif($o->status==1)
                                     {{'Đang xử lý'}}
                                     @elseif($o->status==2)
                                     {{'Đã Giao Hàng'}}
                                     @elseif($o->status==3)
                                     {{'Hết Hàng'}}
                                   @endif
                                </td>

                                 <td>
                                    <a href="admin/hoadon/sua/{{$o->id}}" title="Cập Nhật Trạng Thái">Cập Nhật</a>
                                </td>
                                <td>
                                    <a href="admin/hoadon/chitiethoadon/{{$o->id}}" title="Chi tiết Hóa Đơn">Chi Tiết Hóa Đơn</a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                   </table>   --> 
               </div> 
@endsection 
                 
                 