<div class="row four">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">


                            <ol class="carousel-indicators">
                                <?php $i=0; ?>
                               @foreach($slide as $sl)
                                <li data-target="#myCarousel" data-slide-to="{{$i}}" 
                                    @if($i==0)
                                      class="active">
                                     @endif

                                </li>
                                 <?php $i++; ?>
                               @endforeach
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <?php $i=0; ?>
                              @foreach($slide as $sl)
                              <div
                                @if($i == 0)
                               class="item active"
                               @else 
                                 class="item"
                                @endif
                               >
                               <?php $i++; ?>
                                  <img src="uploads/slidershow/{{$sl->image}}"  width="1140px" height="459px" 
                                  alt="Đồ Gỗ Thịnh Gia" >
                                        <div class="carousel-caption">
                                            <h3>Đồ Gỗ Thịnh Gia</h3>
                                             <p>Uy tín chất lượng , Giá cả hợp lý ,Mẫu mã thời trang</p>
                                        </div>
                               </div>
                               @endforeach
                              
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" 
                               style="background-image: none">
                              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"
                                style="background-image: none">
                              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
</div>