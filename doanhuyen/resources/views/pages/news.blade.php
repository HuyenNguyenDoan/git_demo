 @extends('layout.index')

@section('title')
  Tin Tức
@endsection

@section('css')
<link rel="stylesheet" href="css/news.css"/>
@endsection


@section('content')

                              <div class="hearder1">
                                    <h4>Danh Sách Tin Tức</h4>
                                </div>
                              <br/>
                                @foreach( $list_news as $ln)
                              <div class="list-news1">

                                  <div class="image-news1">
                                   <img src="uploads/news/{{$ln->images}}" alt="" width="150px" height="75px"> 
                                  </div>

                                  <div class="title-news1">
                                       <a href="#" title="Xem chi tiết">
                                       <i>{{$ln->title}}</i>
                                       </a>
                                             

                                       <p>20-10 sat</p>
                                  </div>
                              </div>
                              @endforeach

                              {{$list_news->links()}}


                                

  @endsection
                              