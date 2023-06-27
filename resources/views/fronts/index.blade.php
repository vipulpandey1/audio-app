@extends('layouts.frontend')
@section('content')
<style>
    .play{
    width: 40px !important;
    position: absolute;
    top: 50%;
   left: 50%;
   margin-top: -20px; /* Half the height */
   margin-left: -20px; /* Half the width */
    /* box-shadow: 1px 2px 8px yellow; */
    /* border-radius: 100%; */
    //border: 7px solid rgba(255,255,255,0.5);
    //border-radius: 100% !important;
    }
    .custom-bg{    
        //background-image: url(../images/blur-bg.png") !important;
        top: -47px;}
    /*.sec{background:transparent !improtant;}*/
     /*background: linear-gradient(360deg, #000000, #000000 60%, #0000);}*/
     
     .img-container1 {
        width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    background: rgb(20, 20, 20);
    background: linear-gradient( 0deg, rgba(20, 20, 20, 1) 0%, rgba(255, 255, 255, 0) 36% );
    min-height: 609px;
    position:absolute;
    }
    .img-container {
        width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    background: rgb(20, 20, 20);
    background: linear-gradient( 0deg, rgba(20, 20, 20, 1) 0%, rgba(255, 255, 255, 0) 36% );
    min-height: 609px;
    }
    .top-item{
            width: 100%;
    min-height: 600px;
    display: flex;
    align-items: center;
    /*background-image: url(https://sunokahaniyan.com/html/images/netflix-banner.jpg);*/
    background-repeat: no-repeat;
    background-size: cover;
    }
    @media screen and (max-width:1024px) {
        .img-container {
            min-height: 500px;
        }
        .top-item{
             min-height: 500px;
         }
          .mh{height:5px;}
    }
    @media screen and (max-width:900px) {
        .img-container {
            min-height: 500px;
        }
         .top-item{
             min-height: 500px;
         }
          .mh{height:5px;}
    }
     @media screen and (min-width:768px){
          .mh{height:5px;}
     }
     @media screen and (max-width:768px)
    {
        .img-container1 {
        min-height:300px;
    }
     .mh{height:5px;}
    
    }
    @media only screen and (max-width: 800px) and (min-width: 700px)  {
        .img-container {
            min-height: 470px;
        }
         .top-item{
             min-height: 400px;
         }
          
    }
    @media only screen and (max-width: 700px) and (min-width: 680px)  {
        .img-container {
            min-height: 400px;
        }
         .top-item{
             min-height: 400px;
              background-size: contain;
         }
          
         
    }
    @media only screen and (max-width: 680px) and (min-width: 600px)  {
        .img-container {
            min-height: 360px;
        }
         .top-item{
             min-height: 360px;
              
         }
          
    }
    
    @media only screen and (max-width: 600px) and (min-width: 550px)  {
        .img-container {
            min-height: 376px;
        }
         .top-item{
             min-height: 369px;
            
         }
         
    }
     @media only screen and (max-width: 550px) and (min-width: 500px)  {
        .img-container {
            min-height: 391px;
        }
         .top-item{
             min-height: 340px;
             
         }
          
    }
     @media only screen and (max-width: 500px) and (min-width: 400px)  {
        .img-container {
            min-height: 381px;
        }
         .top-item{
             min-height: 340px;
              /*background-size: contain;*/
         }
         
    }
    
    @media only screen and (max-width: 400px) and (min-width: 380px)  {
        .img-container {
            min-height: 294px;
        }
         .top-item{
             min-height: 294px;
              /*background-size: contain;*/
         }
          .mh{height:2px;}
    }
     @media only screen and (max-width: 380px) and (min-width: 350px)  {
        .img-container {
            min-height: 272px;
        }
         .top-item{
             min-height: 272px;
              /*background-size: contain;*/
         }
          
    }
    /*new player */
    /*audio::-webkit-media-controls-timeline,*/
video::-webkit-media-controls-timeline {
    display: none;
}
/*audio::-webkit-media-controls,*/
video::-webkit-media-controls {
    display: none;
}
  #play i{
    color: #fff;
    font-size: 25px;
  }
  #progress-container{
    background: #404040;
    border-radius: 5px;
    cursor: pointer;
    margin: 10px 0;
    height: 5px;
    width: 100%;
  }
  #progress{
    height:4px !important;
    background:#fff;
  }
  .play-contol {
    margin-top: 1.8rem;
}
.modal-content{
    background:rgb(0 ,0, 0 , 1);
    height:100%;
}
#closepopup{
        background: transparent;
    border: 1px solid #fff;
    color: #fff;
    border-radius: 100%;
    width: 30px;
    height: 30px;
        position: absolute;
    z-index: 999;
    top: 7%;
    left: 5%;
}
.btn-n-p {
    max-width: 30px;
}
#countlink{
    display:block;
    color:red;
    text-align:center;
}
.red-text{
   color:red; 
}
.grey-text{
   color:grey; 
}
</style>
 <!--start slider-->
 <section class="slider-section" style="background: linear-gradient( 0deg,rgba(20,20,20,1) 0%,rgba(255,255,255,0) 36% );">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    
      <div class="carousel-inner ">
      @foreach ($slider_top as $key=>$val)
        <div class="carousel-item {{$key == 0 ?  'active' : '' }}" >
          <!--<div class="top-item" style="background-image: url('{{ asset('uploads/slider/'.$val->image) }}');"> -->
          <a href="{{!empty($val->link) ? $val->link : "" }}"><div class="img-container1"></div></a>
              <!--<img src="{{ asset('uploads/slider/'.$val->image) }}" class="d-block w-100" alt="...">-->
              <picture>
  <source media="(min-width:650px)" srcset="{{ asset('uploads/slider/'.$val->image) }}">
  <source media="(min-width:350px)" srcset="{{ asset('uploads/slider/mobile/'.$val->mobile_image) }}">
   <img src="{{ asset('uploads/slider/'.$val->image) }}" class="d-block w-100" alt="...">
</picture>
          <!--<div class="carousel-caption ">-->
            <!--<h1 class="show-title">{{$val->title}}</h1>-->
            <!-- <p>Category: {{$val->name}}</p> -->
          <!--  <a href="#" ><img src="{{asset('assets-front/images/btn-ply.png')}}"/></a>-->
          <!--</div>-->
          
          
          <!--</div>-->
          
          
          
        </div>
        @endforeach
        
        
     
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
  <!--end slider-->
     <!-- The Modal -->
<div class="modal" id="listview">
  <div class="modal-dialog" style="max-width:1920px;width:100%;background:#fff;margin:0px !important;padding:0px !important;height:100%">
    <div class="modal-content" >
   <button type="button" id="closepopup" data-bs-dismiss="modal" aria-label="Close">x</button>
      <!-- Modal body -->
      <div class="modal-body">  
           <section class="mob">
    <!-- Modal -->
<!--<button type="button" id="click_hll">click</button>-->
    <audio src="" id="audioads"></audio>
    <div class="mob-inner">
         
  <div class="pic">
<div class="container music-container" id="music-container">
   
  <div id="devItem" style="display:none"></div>
  <input type="hidden" id="pro_id" value="">
   <input type="hidden" id="audio_id" value="">
  <div class="d-flex justify-content-center">
 <audio src="" id="audio11"></audio>
<div class="col-lg-12">
  <img src="" class="card-img" alt="" id="cover" />
 
</div>
 <div class=" contentt">
     <a href="" class="gray-color">  <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
  <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
</svg> </a>
  </div>
</div>
</div>
</div>

<div class="play-area">
<div class="container ">
 
<div class="mob col-lg-12">
  <div class="hist">
  <div><h6 id="title"></h6>
  <h6 id="titleAds" style="color:red;display:none">Ads</h6>
  <span id="buffer" style="display:none"><img src="{{asset('assets-front/images/load-spinner.gif')}}" style="max-width: 27px;position:absolute;right: 20px;top: 99px;"></span>

</div>
@if(!empty(Auth::guard('user')->user()) && Auth::guard('user')->user()->role_id == 2)   
 <a href="javascript:void(0)" class="gray-color" id="likebtn" onclick="like_list()"><svg  width="22" height="22" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
  <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
</svg> 
<span id="countlink"></span>
</a>
@else
 <a href="{{ route('loginFrontEnd') }}" class="gray-color" id="likebtn" ><svg  width="22" height="22" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
  <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
</svg> 
<span id="countlink"></span>
</a>
@endif
</div>

</div>
  <div class="control">
  <div class="progress-container" id="progress-container">
  <!-- <input type="range" class="progress" min="0" max="100" value="" id="progress"> -->
  <div class="progress" id="progress" ></div>
  <div class="value-of-range" style="left: 0%">
    <span class="value" id="currTime">0:0</span>/<span id="durTime"></span>
  </div>
  </div>
  <div class="play-contol">
   <a href="javascript:void(0)" id="prev">

<img src="{{asset('assets-front/images/previous.png')}}" class="btn-n-p">
    </a>
    
  <a href="javascript:void(0)" id="rewind" > <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
</svg>
</a>
    
    <a href="javascript:void(0)" id="play" >  
          <i class="fas fa-play"></i>
</a> 
    
     <a href="javascript:void(0)" id="forword" >  <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
  <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
</svg> </a>
     <a href="javascript:void(0)" id="next" >  
      <img src="{{asset('assets-front/images/next.png')}}" class="btn-n-p">
      </a>
  
  </div>
  </div>
  </div>
</div>
</div>
</section>

      </div>


    </div>
  </div>
</div>
<!--start slider-->
<section class="movies-thumb-slider bg-section-1 top-slider-ve">
  <!--<div class="gallery custom-bg">-->
<!--    <div class="container">-->
<!--      <div class="inner-galry">-->
<!--        <ul>-->
<!--          <li>-->
<!--            <a href="#">-->
<!--              <img src="{{asset('assets-front/images/gallery/top-gallery-1.jpg')}}" alt="..." /> Drama </a>-->
<!--          </li>-->
<!--          <li>-->
<!--            <a href="#">-->
<!--              <img src="{{asset('assets-front/images/gallery/top-gallery-2.jpg')}}" alt="..." /> Story </a>-->
<!--          </li>-->
<!--          <li>-->
<!--            <a href="#">-->
<!--              <img src="{{asset('assets-front/images/gallery/top-gallery-3.jpg')}}" alt="..." />Crime </a>-->
<!--          </li>-->
<!--          <li>-->
<!--            <a href="#">-->
<!--              <img src="{{asset('assets-front/images/gallery/top-gallery-4.jpg')}}" alt="..." />Horror </a>-->
<!--          </li>-->
<!--          <li>-->
<!--            <a href="#">-->
<!--              <img src="{{asset('assets-front/images/gallery/top-gallery-5.jpg')}}" alt="..." />Book </a>-->
<!--          </li>-->
<!--          <li>-->
<!--            <a href="#">-->
<!--              <img src="{{asset('assets-front/images/gallery/top-gallery-6.jpg')}}" alt="..." />Kids </a>-->
<!--          </li>-->
<!--        </ul>-->
<!--      </div>-->
<!--    </div>-->
  <!--</div>-->
  <!--start slider-->

  @if(count($rec) != 0)
 
  <div class="movies-thumb-slider bg-section-1 minus_margins" >
    <div class="container">
      <div class="d-flex align-items-center position-relative heading-rel-abs">
        <div>
          <h3 class="mb-0">Recommendation</h3>
        </div>
        <div class="ms-auto">
          <!--<a href="#" class="more-videos-link btn">-->
          <!--  <span class="d-none d-md-inline">More</span>-->
          <!--  <span>-->
          <!--    <i class="bi bi-chevron-double-right d-inline d-md-none"></i>-->
          <!--  </span>-->
          <!--</a>-->
        </div>
      </div>
      <div class="movies-thumbs-block movieNEw">
        <div class="movies-inner-block ">
        
          @foreach($rec as $rec1)
          <div class="card">
          <a href=" {{ route('front_end_products',['url' => $rec1->url,'id' => $rec1->id]) }}" onclick="get_value_in('{{ $rec1->sub_category_id}}')" id="get_value">  <img src="{{ asset('/uploads/product/desktop-image').'/'.$rec1->desktop_image }}" class="card-img" alt=""/></a>
          </div>
          @endforeach  
         
         
        </div>
      </div>
    </div>
  </div>
  @endif
  </div>
  <!--end slider-->
</section>
<!--end slider-->

  
  <!--start slider-->
  
 @if(!empty(Auth::guard('user')->user()) && Auth::guard('user')->user()->role_id == 2 && count($watching) != 0)
  <section class="movies-thumb-slider bg-section-2">
    <div class="container">
      <div class="d-flex align-items-center position-relative heading-rel-abs" style="width:100%">
        <div>
          <h3 class="mb-0">Continue Listening</h3>
        </div>
        <div class="ms-auto">
            <!--<a href="#" class="more-videos-link btn"><span class="d-none d-md-inline">More</span><span><i class="bi bi-chevron-double-right d-inline d-md-none"></i></span></a>-->
            </div>
      </div>
        <div class="movies-thumbs-block movieNEw">
       <div class="movies-inner-block ">
        
          
          @foreach($watching as $rec1)
          @if($rec1->end_time != 0)
          <div class="card">
              
          <a href="{{route('front_end_products',['url' => $rec1->products->url, 'id' => $rec1->products->id])}}" onclick="get_value_in('{{ $rec1->products->sub_category_id}}')" id="get_value">  <img src="{{ asset('/uploads/product/desktop-image').'/'.$rec1->products->desktop_image }}" class="card-img" alt=""/></a>
          <img src="{{ asset('assets-front/images/play-button .png') }}" class="play">
          <div class="progress wt mh">
          <div class="progress-bar" role="progressbar" style="width: {{round(($rec1->duration_time / $rec1->end_time) * 100)}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          </div>
          @endif
          @endforeach  
      
       
        
         </div>
      </div>
    </div>
  </section>
  @endif
  <!--end slider-->

@if(count($recentAdd ) != 0)
<section class="movies-thumb-slider bg-section-1 ">
    <div class="container">
      <div class="d-flex align-items-center position-relative heading-rel-abs">
        <div>
          <h3 class="mb-0">Recently Add</h3>
        </div>
      
      </div>
        <div class="movies-thumbs-block movieNEw">
       <div class="movies-inner-block ">
        
          @foreach($recentAdd as $row1) 
          <div class="card">
            <a href="{{ route('front_end_products',['url' => $row1->url,'id' => $row1->id]) }}"  onclick="get_value_in('{{ $row1->sub_category_id}}')">  <img src="{{ asset('/uploads/product/desktop-image').'/'.$row1->desktop_image }}" class="card-img" alt=""/></a>
            
          </div>
        @endforeach
      
        
         </div>
      </div>
    </div>
  </section>
@endif

@if(count($trending) != 0)
<section class="movies-thumb-slider bg-section-1 ">
    <div class="container">
      <div class="d-flex align-items-center position-relative heading-rel-abs">
        <div>
          <h3 class="mb-0">Trending</h3>
        </div>
      
      </div>
        <div class="movies-thumbs-block movieNEw">
       <div class="movies-inner-block ">
        
          @foreach($trending as $row1) 
          <div class="card">
            <a href="{{ route('front_end_products',['url' => $row1->url,'id' => $row1->id]) }}"  onclick="get_value_in('{{ $row1->sub_category_id}}')">  <img src="{{ asset('/uploads/product/desktop-image').'/'.$row1->desktop_image }}" class="card-img" alt=""/></a>
            
          </div>
        @endforeach
      
        
         </div>
      </div>
    </div>
  </section>  
@endif 
@foreach($subcategory as $key => $row)
@if($key == 0)
<section class="movies-thumb-slider @if($key % 2 == 0) {{ 'bg-section-1' }}   @else {{'bg-section-2'}}  @endif">
    <div class="container">
      <div class="d-flex align-items-center position-relative heading-rel-abs">
        <div>
          <h3 class="mb-0">{{$row->name}}</h3>
        </div>
        <div class="ms-auto"><a href="{{ route('front_end_subcategory',$row->id) }}" class="more-videos-link btn"><span class="d-none d-md-inline">More</span><span><i class="bi bi-chevron-double-right d-inline d-md-none"></i></span></a></div>
      </div>
        <div class="movies-thumbs-block movieNEw">
       <div class="movies-inner-block ">
        
          @foreach($row->product as $row1) 
          <div class="card">
            <a href="{{ route('front_end_products',['url' => $row1->url,'id' => $row1->id]) }}"  onclick="get_value_in('{{ $row1->sub_category_id}}')">  <img src="{{ asset('/uploads/product/desktop-image').'/'.$row1->desktop_image }}" class="card-img" alt=""/></a>
            
          </div>
        @endforeach
      
        
         </div>
      </div>
    </div>
  </section>

  <!--start slider-->
  <section class="movies-thumb-slider web-series-sliderbg-section-2 ">
    <div class="container">
      <div class="d-flex align-items-center position-relative heading-rel-abs">
        <div>
          <h3 class="mb-0"> Audio Book</h3>
        </div>
        <div class="ms-auto"><a href="{{ route('front_end_category',9) }}" class="more-videos-link btn"><span class="d-none d-md-inline">More</span><span><i class="bi bi-chevron-double-right d-inline d-md-none"></i></span></a></div>
      </div>
     
      <div class="movies-thumbs-block webseries">
       <div class="movies-inner-block " >

       @foreach($webseries as $web) 
          <div class="card">
            <a href="{{ route('front_end_products',['url' => $web->url,'id' => $web->id]) }}"  onclick="get_value_in('{{ $web->sub_category_id}}')">  <img src="{{ asset('/uploads/product/desktop-image').'/'.$web->desktop_image }}" class="card-imgs" alt=""/></a>
            
          </div>
        @endforeach
        
         </div>
         
      </div>
    </div>
  </section> 
  <!--end slider-->

@elseif($key == 3)
<section class="make-your">
<a href="{{$ads->linkads}}"><img src="{{ asset('uploads/ads/'.$ads->banner) }}" class="img-fluids d-block"></a>
</section>
  <!--start slider-->
 <section class="movies-thumb-slider @if($key % 2 == 0) {{ 'bg-section-2' }}   @else {{'bg-section-1'}}  @endif">
    <div class="container">
      <div class="d-flex align-items-center position-relative heading-rel-abs">
        <div>
          <h3 class="mb-0">{{$row->name}}</h3>
        </div>
        <div class="ms-auto"><a href="{{ route('front_end_subcategory',$row->id) }}" class="more-videos-link btn"><span class="d-none d-md-inline">More</span><span><i class="bi bi-chevron-double-right d-inline d-md-none"></i></span></a></div>
      </div>
        <div class="movies-thumbs-block movieNEw">
       <div class="movies-inner-block ">
        
          @foreach($row->product as $row1) 
          <div class="card">
            <a href=" {{ route('front_end_products',['url' => $row1->url,'id' => $row1->id]) }}" onclick="get_value_in('{{ $row1->sub_category_id}}')" id="get_value">  <img src="{{ asset('/uploads/product/desktop-image').'/'.$row1->desktop_image }}" class="card-img" alt=""/></a>
          
          </div>
        @endforeach 
      
        
         </div>
      </div>
    </div>
  </section>
  <!--end slider-->
@else
<!--start slider-->
 <section class="movies-thumb-slider @if($key % 2 == 0) {{ 'bg-section-2' }}   @else {{'bg-section-1'}}  @endif">
    <div class="container">
      <div class="d-flex align-items-center position-relative heading-rel-abs">
        <div>
          <h3 class="mb-0">{{$row->name}}</h3>
        </div>
        <div class="ms-auto"><a href="{{ route('front_end_subcategory',$row->id) }}" class="more-videos-link btn"><span class="d-none d-md-inline">More</span><span><i class="bi bi-chevron-double-right d-inline d-md-none"></i></span></a></div>
      </div>
        <div class="movies-thumbs-block movieNEw">
       <div class="movies-inner-block ">
        
          @foreach($row->product as $key => $row1) 
          @if($key < 11)
          <div class="card">
            <a href="{{ route('front_end_products',['url' => $row1->url,'id' => $row1->id]) }}"  onclick="get_value_in('{{ $row1->sub_category_id}}')">  <img src="{{ asset('/uploads/product/desktop-image').'/'.$row1->desktop_image }}" class="card-img" alt=""/></a>
            
          </div>
          @endif
        @endforeach
      
        
         </div>
      </div>
    </div>
  </section>

@endif
@endforeach
@section('scripts')
<script>
$(function() {
    // set csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  });

 function get_value_in(id){
   // let id = $("#get_value").attr("data-id");
    $.ajax({
      url:"{{ route('saveRec') }}",
      type:"post",
      data:{ id : id},
      success:function(res){
        console.log(res);
        // let time = res.duration_time;
        // let endTime = res.end_time;
      },
      error:function(res){
        console.log(res.responseText);
      }
    });

  }
//     localStorage.removeItem("mycurrentTime");
// localStorage.removeItem("myendTime");
</script>
@endsection

  @endsection