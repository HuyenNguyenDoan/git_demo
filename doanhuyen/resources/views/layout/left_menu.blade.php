  <div class="hearder">
                                    <h4>
                                        <span class="glyphicon glyphicon-list"></span>  DANH MỤC SẢN PHẨM
                                    </h4>
                            </div>
                                <div class="drop-category">
                                    <ul class="nav"> 
                                    @foreach($category as $cate)
                                        <li>
                                            <a href="loaisanpham/{{$cate->id}}">{{$cate->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
  
                            <div class="type-category">
                                 <div class="hearder">
                                    <h4>
                                        <span class="glyphicon glyphicon-list"></span>  DANH MỤC LOẠI GỖ
                                    </h4>
                             </div>
                                
                            <div class="drop-type-category">
                                    <ul class="nav"> 

                                    @foreach($typewood as $tw )
                                        <li>
                                            <a href="loaigo/{{$tw->id}}">{{$tw->name}}</a>
                                        </li>
                                       @endforeach
                                    </ul>
                                </div>
                            </div>



                         <div class="news">
                                   <div class="hearder">
                                    <h4>
                                        <span class="glyphicon glyphicon-list"></span> TIN TỨC
                                    </h4>
                                   </div>
                              <div id="content-news">
                                    <ul >
                                    @foreach($news as $new)
                                        <li>
                                            <img src="uploads/news/{{$new->images}}" width="40px" height="40px" />
                                            <span>
                                            <a href="#"> {{$new->title}}</a>
                                            </span> 
                                        </li>
                                      @endforeach
                                    </ul>
                                 </div>
                         </div>
