@extends('layouts.frontend')
@section('content')
<style>
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
.contentt{
    position:absolute;
    top:1rem;
    right:5%;
}
#closepopup{
        background: transparent;
    border: 0px solid #fff;
    color: #fff;
    //border-radius: 100%;
   // width: 30px;
   // height: 30px;
        position: absolute;
    z-index: 999;
    top: 0px;
    left: 0%;
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
  
/**
 * ----------------------------------------------------------------------------------------
 * Book Flip plugin styles.
 * ----------------------------------------------------------------------------------------
 */
.book-container {
  transition: 0.3s left, 0.5s -webkit-transform;
  transition: 0.5s transform, 0.3s left;
  transition: 0.5s transform, 0.3s left, 0.5s -webkit-transform;
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
  position: fixed;
  top: 0;
  left: 0;
  z-index: 2000;
  background-color: #fff;
  width: 100vw;
  overflow: visible;
  min-height: 100vh;
  min-height: -webkit-fill-available; }
  .book-container.showBook {
    -webkit-transform: translateX(0);
            transform: translateX(0);
    opacity: 1; }

.bb-custom-wrapper, .bb-bookblock {
  min-height: 100vh;
  min-height: -webkit-fill-available; }

.bb-custom-wrapper {
  width: 100vw;
  position: relative; }

.slideRight {
  left: 260px; }

.no-js .book-container {
  padding-left: 260px; }

.menu-panel {
  background: #fafafa;
  width: 260px;
  height: 100%;
  position: fixed;
  z-index: 1000;
  top: 0;
  left: 0;
  padding: 50px 20px; }

.js .menu-panel {
  position: absolute;
  left: -260px; }

.menu-panel h3 {
  font-size: 19px;
  margin-bottom: 10px;
  text-transform: uppercase;
  text-align: center;
  letter-spacing: 1px; }

.menu-toc {
  position: relative;
  list-style: none;
  padding: 30px 0;
  height: 90%;
  margin: 0; }

.menu-toc li a {
  transition: .3s;
  display: block;
  padding: 10px 20px;
  border-left: 2px solid #FAAB9F; }
  .menu-toc li a:hover {
    border-left: 10px solid #FAAB9F; }

.menu-toc .menu-toc-current a {
  border-left: 10px solid #FAAB9F; }

.menu-panel div {
  margin-top: 20px; }

.menu-panel div a {
  text-transform: uppercase;
  font-size: 0.7em;
  line-height: 1;
  padding: 5px 20px;
  display: block;
  border: none;
  color: #FAAB9F;
  letter-spacing: 1px;
  font-weight: 800;
  text-shadow: 0 1px rgba(255, 255, 255, 0.2); }

.menu-panel div a:hover {
  background: inherit;
  color: #fff;
  text-shadow: none; }

.bb-custom-wrapper nav span,
.menu-button,
.bb-nav-close {
  position: absolute;
  top: 50%;
  left: 7%;
  color: #FAAB9F;
  font-size: 57px;
  text-align: center;
  speak: none;
  font-weight: bold;
  cursor: pointer;
  z-index: 1000; }

.bb-custom-wrapper nav span:hover,
.menu-button:hover,
.bb-nav-close:hover {
  color: #D38D45; }
  .bb-custom-wrapper nav span:hover:after,
  .menu-button:hover:after,
  .bb-nav-close:hover:after {
    color: #D38D45; }
  .bb-custom-wrapper nav span:hover i,
  .menu-button:hover i,
  .bb-nav-close:hover i {
    color: #D38D45; }

.bb-custom-wrapper nav span:last-child {
  left: auto;
  right: 7%; }

.menu-button {
  left: 60px;
  top: 50px;
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 2px;
  padding-left: 50px; }
  .menu-button i {
    transition: .18s;
    position: absolute;
    font-size: 22px;
    top: 1px;
    left: 10px;
    z-index: 1; }
  .menu-button .close-icon-color {
    color: #FAAB9F; }
    .menu-button .close-icon-color:before, .menu-button .close-icon-color:after {
      background-color: #FAAB9F; }
  .menu-button:hover .close-icon-color {
    color: #D38D45; }
    .menu-button:hover .close-icon-color:before, .menu-button:hover .close-icon-color:after {
      background-color: #D38D45; }
  .menu-button span {
    display: inline-block;
    transition: .18s;
    opacity: 0;
    visibility: hidden;
    -webkit-transform: translateX(-60px) scale(0.6);
            transform: translateX(-60px) scale(0.6); }
  .menu-button:hover span, .menu-button.hovered span {
    opacity: 1;
    visibility: visible;
    -webkit-transform: translateX(0) scale(1);
            transform: translateX(0) scale(1); }
  .menu-button:hover i, .menu-button.hovered i {
    -webkit-transform: scale(1.2);
            transform: scale(1.2); }

.bb-nav-close {
  transition: .18s;
  right: 70px;
  top: -13px;
  left: auto; }

.no-js .bb-custom-wrapper nav span,
.no-js .menu-button {
  display: none; }

.js .book-content {
  position: absolute;
  left: 0;
  width: 100%;
  height: 100vh;
  padding: 100px 22%;
  overflow: hidden;
  -webkit-font-smoothing: subpixel-antialiased; }

.book-content-inner {
  position: relative;
  height: 100%;
  padding-right: 70px; }

.book-content h2 {
  font-weight: 300;
  font-size: 4em;
  padding: 0 0 10px;
  color: #333;
  margin: 0 1% 40px;
  text-align: left;
  box-shadow: 0 10px 0 rgba(0, 0, 0, 0.02);
  text-shadow: 0 0 2px #fff; }

.no-js .book-content h2 {
  padding: 40px 1% 20px; }

.book-content p {
  margin-bottom: 20px;
  font-family: 'Mulish';
  color:#333;
  font-weight:300;
  text-align:justify;
    
}

.bb-bookblock {
  position: relative;
  width: 100vw;
  height: 100vh; padding-bottom:150px;}
  .bb-bookblock h1, .bb-bookblock h1, .bb-bookblock h3, .bb-bookblock h4, .bb-bookblock h5, .bb-bookblock h6 {
    text-align: center; }

.menu-panel,
.book-content {
  font-size: 22px;
  font-weight: 300;
  line-height: 37px; }

.bb-custom-side {
  position: relative;
  float: left;
  overflow: hidden;
  width: 50%;
  height: 100%; }

.bb-custom-side::before {
  position: absolute;
  top: 0;
  z-index: 100;
  width: 80px;
  height: 100%;
  box-shadow: inset 30px 0 40px -20px rgba(0, 0, 0, 0.1);
  content: ''; }

.bb-custom-side:first-child::before {
  right: 0;
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, 0.05), inset -30px 0 40px -20px rgba(0, 0, 0, 0.15); }

.chapter-heading {
  margin-bottom: 30px;
 font-family: Cinzel Decorative; 
 color: #222;
    font-weight: 700;
    line-height: 1.4;
    
}

.book-content  p:first-of-type::first-letter {
  -webkit-initial-letter: 4 5;
          /*initial-letter: 4 5;*/
  float: left;
font-size: 78px !important;
font-weight: 700;
line-height: 22px;
padding: 16px 30px 0px 0px;
color: #d38d45;
font-family: Cinzel Decorative;
font-style: normal;
display:inline-block;

}

  .menu-panel h3{
      font-family: Cinzel Decorative;
font-style: normal;
font-weight:600;
  }

@media only screen and (max-width: 1199px) {
.book-content  p:first-of-type::first-letter {

font-size: 68px;


}
  .js .book-content {
    padding: 100px 14% 80px; }
  .menu-button, .bb-nav-close {
    //top: 0px;
    }
  .menu-button {
    left: 40px;
    padding-left: 45px; }
  .bb-nav-close {
    right: 40px; }
  .menu-panel {
    padding: 100px 20px 50px; }
  .bb-custom-wrapper nav span {
    left: 3%; }
  .bb-custom-wrapper nav span:last-child {
    left: auto;
    right: 3%; } }

@media only screen and (max-width: 991px) {
    .book-content  p:first-of-type::first-letter {

font-size: 58px;


}
  .book-content-inner {
    padding-right: 45px; }
  .chapter-heading {
    margin-bottom: 50px; }
  .menu-panel,
  .book-content {
    font-size: 20px; }
  .bb-custom-wrapper nav span {
    font-size: 72px; } }

@media only screen and (max-width: 767px) {
    .book-content  p:first-of-type::first-letter {
font-size: 48px;
}
.cl .bi-x {
    top: 9px !important;
    right: -1px !important;
}
 
    .menu-panel, .book-content {
    font-size: 18px !important;
    line-height: 30px !important;
}
  .no-js .menu-panel {
    display: none; }
  .no-js .book-container {
    padding: 0; }
  .js .book-content {
    padding: 60px 30px 50px; }
  .menu-button, .bb-nav-close {
    top: 20px; }
 .menu-button {
    left: 19px !important;
}

  .bb-nav-close {
    right: 20px;
    top:-16px;}
  .book-content-inner {
    padding-bottom: 70px; }
  .bb-custom-wrapper nav {
    //background-color: #fff;
    position: absolute;
    bottom: 100px;
    left: 0;
    right: 0;
    height: 80px;
    z-index: 9999; }
  .bb-custom-wrapper nav span {
    top: auto;
    left: 10%;
    bottom: 20px;
    font-size: 66px; }
  .bb-custom-wrapper nav span:last-child {
    right: 10%; } }

@media only screen and (max-width: 480px) {
    .book-content  p:first-of-type::first-letter {

font-size: 52px !important;
display:inline-block;
padding: 16px 16px 0px 0px;

}
  .menu-button {
    left: 0px !important;
    padding-left: 45px; }
   .cl .bi-x{
    top: 8px !important;
    right:-1.4rem !important;
  }
  .js .book-content {
    padding: 60px 10px 0px; }
  .no-js .book-container {
    padding-left: 200px; }
  .book-content-inner {
    padding-right: 30px; }
  .chapter-heading {
    margin-bottom: 30px; }
  .menu-panel,
  .book-content {
    font-size: 17px;
    line-height: 28px; }
  .menu-button span {
    opacity: 1;
    font-size: 14px;
    visibility: visible;
    -webkit-transform: scale(1);
            transform: scale(1); }
  .bb-custom-wrapper nav span {
    //bottom: 45px; 
      
  }
  .js .menu-panel {
    left: -200px; }
  .slideRight {
    left: 200px; }
  .menu-panel {
    width: 200px;
    padding: 100px 10px 50px; } }



    /**
*  Page Flip Book
*/
.PageFlipBook {
  -webkit-perspective: 1200px;
          perspective: 1200px; }
  .PageFlipBook a, .PageFlipBook .has-edge {
    transition: .2s;
    display: inline-block; }
  .PageFlipBook .page-flip-book-ribbon {
    position: absolute;
    top: 40%;
    right: -12px;
    background-color: #fff;
    text-transform: uppercase;
    padding: 10px 20px;
    background-color: #FAAB9F;
    color: #fff;
    font-size: 13px;
    letter-spacing: 1px;
    text-align: left;
    width: 50%;
    transition: .2s;
    z-index: 1;
    -webkit-transform-origin: 100% 0;
            transform-origin: 100% 0; }
    .PageFlipBook .page-flip-book-ribbon .fa-spinner {
      font-size: 17px; }
    .PageFlipBook .page-flip-book-ribbon span {
      margin-left: 10px; }
    .PageFlipBook .page-flip-book-ribbon:after {
      content: '';
      position: absolute;
      top: 100%;
      right: 0;
      width: 0;
      height: 0;
      border-style: solid;
      border-width: 15px 15px 0 0;
      border-color: #D38D45 transparent transparent transparent; }
  .PageFlipBook .has-edge {
    position: relative; }
  .PageFlipBook:hover a {
    opacity: 1; }
  .PageFlipBook:hover .has-edge {
    -webkit-transform: rotateY(-35deg);
            transform: rotateY(-35deg); }
  .PageFlipBook:hover .single-has-edge:after {
    opacity: 1; }
  .PageFlipBook:hover .has-edge .page-flip-book-ribbon {
    right: 0;
    -webkit-transform: rotateY(35deg) translate3d(10px, 0%, 20px);
            transform: rotateY(35deg) translate3d(10px, 0%, 20px); }

</style>
<section class="@if($products->category_id != 5 ) paly-page @endif bg-section-1 rs-space" >
    <div class="container">
        <div class="d-flex justify-content-center">
        <div class="col-md-3 play-araa ">
          @if (!empty($products->desktop_image))
            
          <img src="{{ asset('uploads/product/desktop-image/'.$products->desktop_image)}}" class="card-img" alt="" @if($products->category_id == 5 ) style="max-width: 216px;" @endif/> 
          @endif
          
            <div class="d-flex justify-content-center gap-2 pt-3 text-center">
                @if ($products->category_id == 11 || $products->category_id == 12 && !$products->reading->isEmpty())
                <div>
                 <a href="javascript:void(0)" onclick="ajax_content('{{$products->id}}')" class="is-page-flip btn btn-theme-white">{{$products->category_id == 11 ? "Read Now" : "अभी पढ़ें"}} </a>
                </div>
                
                <div class="reloaded-divs">
               @if(!empty(Auth::guard('user')->user()) && Auth::guard('user')->user()->role_id == 2 && !$products->audios->isEmpty()) )   
               
                  <a href="javascript:void(0)" class="btn btn-light-2 btn-theme-white1" onclick="get_playlist('{{$products->audios[0]->id}}','{{$products->id}}',{{ $SaveStatus ? '1' : '0'}})"><i class="bi bi-plus-lg me-1"></i>{{ $SaveStatus ? 'Added' : 'Library'}}</a>
                  
                @else
                <a href="{{ route('loginFrontEnd') }}" class="btn btn-light-2 btn-theme-white1" ><i class="bi bi-plus-lg me-1"></i>{{$products->category_id == 12 ? "लाइब्रेरी" : "Library" }}</a>
                @endif
                </div>
               @endif  
               
              
                
        
            @if(!$products->audios->isEmpty())  
                <div>
                 
                  <!--<a href="{{ route('front_play_audio',$products->audios[0]->id) }}" class="btn btn-theme-white">Play Now </a>-->
                   <a href="javascript:void(0)" onclick="load_player('{{$products->audios[0]->id}}',0)" class="btn btn-theme-white">Play Now </a>
                  
                </div>
                
                <div id="refreshDivID">
                    <div class="reloaded-divs">
               @if(!empty(Auth::guard('user')->user()) && Auth::guard('user')->user()->role_id == 2)   
               
                  <a href="javascript:void(0)" class="btn btn-light-2 btn-theme-white1" onclick="get_playlist('{{$products->audios[0]->id}}','{{$products->id}}',{{ $SaveStatus ? '1' : '0'}})"><i class="bi bi-plus-lg me-1"></i>{{ $SaveStatus ? 'Added' : 'Library'}}</a>
                  
                @else
                <a href="{{ route('loginFrontEnd') }}" class="btn btn-light-2 btn-theme-white1" ><i class="bi bi-plus-lg me-1"></i>Library</a>
                @endif
                </div>
                </div>
              @endif
              </div>
              <div class="py-3 text-center">
                <h2 class="show-title">{{$products->title ?? ''}}</h2>
                @if(!empty($products->author))
                <p class="show-para mb-0"><span class="gry-color">{{$products->category_id == 12 ? "लेखक" : "Author" }}:</span> {{$products->author}}</p>
                @endif
                @if(!empty($products->narrator))
                <p class="show-para mb-0"><span class="gry-color">{{$products->category_id == 12 ? "कथावाचक" : "Narrator" }}:</span> {{$products->narrator}}</p>
                @endif
                @if(!empty($products->genre))
                <p class="show-para mb-0"><span class="gry-color">{{$products->category_id == 12 ? "शैली" : "Genre" }}:</span> {{$products->genre}}</p>
                @endif
                @if(!empty($products->duration))
                <p class="show-para mb-0"><span class="gry-color">{{$products->category_id == 12 ? "अवधि" : "Duration" }}:</span> {{$products->duration}}</p>
                @endif
               
                  
             </div>
        </div>
        </div>
        
         <div class="movies-thumb-slider bg-section-1 py-3 descri">
   
        <div class="movies-1">
        <h4> {{$products->category_id == 12 ? "विवरण" : "Description" }}  </h4>
       
       
 
   

   
<div class="article">
  <div class="text short">
      @php echo $products->description @endphp
  </div>
  <span class="read-more">....Read more</span>
</div>
 
 <!--=========================Reading=========================================-->
 @if (!$products->reading->isEmpty())
  <div class="movies-thumb-slider bg-section-1 py-3">
    
        <div class="movies-1" style="padding-left:0px">
        <div class="d-flex align-items-center position-relative heading-rel-abs">
            <h4 class="mb-0-1">{{$products->category_id == 11 ? "Episodes" : "अध्याय"}}</h4>
          </div>
         
            
          @foreach($products->reading as $key => $row1)
          <div class="episod py-2 border-bottom">
            <div class="episod-pic">
              @if(!empty($products->desktop_image))
              @php $img = asset('uploads/product/desktop-image/'.$products->desktop_image); @endphp
                 @else
                 @php $img = asset('images/audio1.jpg/'); @endphp
                 @endif
                <img src="{{ asset('uploads/product/desktop-image/'.$products->desktop_image)}}"  alt="" width="66" height="66"/> 
                <div class="episod-text">
                  <h6>{{$row1->title}}  </h6>
                  
                </div>
              </div>
            <a href="?&read-book={{$products->id}}&read-book-chapter={{$key}}" ><svg width="22" height="22" fill="currentColor" class="bi bi-play-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z"/>
            </svg></a>
          </div>
        @endforeach
      
        
       
        </div>
    </div>
    @else
    @if($products->category->id != 5)
  <div class="movies-thumb-slider bg-section-1 py-3">
    
        <div class="movies-1" style="padding-left:0px">
        <div class="d-flex align-items-center position-relative heading-rel-abs">
            <h4 class="mb-0-1">Episodes</h4>
          </div>
         
            
          @foreach($products->audios as $key => $row1)
          <div class="episod py-2 border-bottom">
            <div class="episod-pic">
              @if(!empty($products->desktop_image))
              @php $img = asset('uploads/product/desktop-image/'.$products->desktop_image); @endphp
                 @else
                 @php $img = asset('images/audio1.jpg/'); @endphp
                 @endif
                <img src="{{ asset('uploads/product/desktop-image/'.$products->desktop_image)}}"  alt="" width="66" height="66"/> 
                <div class="episod-text">
                  <h6>{{$row1->title}}  </h6>
                  <p>Duration 11 minutes</p>
                </div>
              </div>
            <a href="javascript:void(0)" onclick="load_player('{{$row1->id}}','0')"><svg width="22" height="22" fill="currentColor" class="bi bi-play-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z"/>
            </svg></a>
          </div>
        @endforeach
        
        
       
        </div>
    </div>
    @endif
    <!--================================================-->
    @endif
    
    <!--=====================================================-->
   
   

   
  
 </div>

   
   <!--...........-->
    </div>
   
</section>
  <!--start slider-->
 
   <!-- The Modal -->
<div class="modal" id="listview">
  <div class="modal-dialog" style="max-width:1920px;width:100%;background:#fff;margin:0px !important;padding:0px !important;height:100%">
    <div class="modal-content" >
   
      <!-- Modal body -->
      <div class="modal-body">  
           <section class="mob">
               
    <!-- Modal -->
<!--<button type="button" id="click_hll">click</button>-->
    <audio src="" id="audioads"></audio>
    <div class="mob-inner" >
        <img id="closepopup" data-bs-dismiss="modal" aria-label="Close" src="{{asset('assets-front/images/white-icon.png')}}" style="max-width: 28px;width: 100%;top: 18px;">
         <!--<button type="button" id="closepopup" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-angle-down" style="line-height:29px;font-size:45px"></i></button>-->
  <div class="pic">
<div class="container music-container" id="music-container">
   
  <div id="devItem" style="display:none"></div>
  <input type="hidden" id="pro_id" value="">
   <input type="hidden" id="audio_id" value="">
  <div class="d-flex justify-content-center" >
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
  <section class="movies-thumb-slider bg-section-2">
    <div class="container">
      <div class="d-flex align-items-center position-relative heading-rel-abs">
        <div>
          <h3 class="mb-0">Similar Listening</h3>
        </div>
        <!--<div class="ms-auto"><a href="#" class="more-videos-link btn"><span class="d-none d-md-inline">More</span><span><i class="bi bi-chevron-double-right d-inline d-md-none"></i></span></a></div>-->
      </div>
        <div class="movies-thumbs-block movieNEw">
       <div class="movies-inner-block ">      

  
@foreach($products_all as $row) 
@if($row->sub_category_id == $products->sub_category_id && $row->id !== $products->id) 
<div class="card">
  <a href=" {{ route('front_end_products',['url' => $row->url, 'id' => $row->id]) }}" onclick="get_value_in('{{ $row->sub_category_id}}')" id="get_value">  <img src="{{ asset('/uploads/product/desktop-image').'/'.$row->desktop_image }}" class="card-img" alt=""/></a>
  
</div>
@endif
@endforeach


         </div>
      </div>
    </div>
  </section>
  <!--end slider-->
  <style>
  #tblcontents .bi-x{
      font-size:40px;
      top: -10px;
    left: -1px;
  }
  .cl .bi-x{
      position: absolute;
    top: 26px;
    right: -10px;
    font-size: 50px;
  }
  
  .article {

   padding: 3px;
   margin: 2px;
}
.article .text {
   font-size: 12px;
   line-height: 17px;
   font-family: arial;
}
.article .text.short {
   height: auto;
   overflow: hidden;
}
.article .text.full {

}
.read-more {
   cursor: pointer;
   display: inline-block;    
   font-weight: bold;
   padding: 3px;
    text-align:center;
   color: white;
   margin:2px;
   color:red;
}
.read-more{display:none;}
      .bt-player{
          position:fixed;
          bottom:0px;
          width:100%;
          height:65px;
          background:#000;
          z-index:99;
          display:none;
      }
      .pl-con{
    display: flex;
    max-width: 1440px;
    margin: auto;
}
      .pl-control{
    display: flex;
    flex: 1;
    justify-content: center;
    align-items: center;
      }
      .slide-bar{
    flex: 1 40%;
        padding: 12px 0px;
}
.pl-control button:nth-child(2){
    //border-right:0px;
    background:#111;
} 
.pl-control button {
    margin: 0;
    padding: 0px 20px;
    border: 0;
    outline: 0;
   
    position: relative;
    display: block;
    height: 74px;
    text-align: center;
    cursor: pointer;
    transition: background 0.3s ease;
    color:#fff;
    font-size:34px;
    background:#222222;
}
.track {
    position: relative;
    width: 100%;
    align-self: flex-start;
    padding: 2px 0 0;
    color:#fff;
}
.track__title {
    position: absolute;
    width: 100%;
    overflow: hidden;
    padding-right: 80px;
    text-align: left;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.track__time {
    position: absolute;
    top: 5px;
    right: 0;
}
.progress-container-1-ads {
    position: relative;
    padding: 7px 0;
    margin-top: 25px;
    overflow: hidden;
    cursor: pointer;
}
.progress-container-1 {
    position: relative;
    padding: 7px 0;
    margin-top: 25px;
    overflow: hidden;
    cursor: pointer;
}
.progress-1 {
    height: 3px;
    border-radius: 3px;
    background: #ddd;
}
.btn-cn{font-size:29px;}
.progress__bar_1,.progress__bar_1ads {
    background: steelblue;
    z-index: 1;
}
.progress__preload_1{
    background: #c4c4c4;
    z-index: 0;
}
.progress__bar_1, .progress__preload_1,.progress__bar_1ads {
    position: absolute;
    width: 0;
    height: 3px;
    border-radius: 3px 0 0 3px;
}

.pl-1{justify-content: end;margin-right:2rem}
.pl-2{justify-content: start;margin-left:2rem}

 @media screen and (max-width:600px)
    {
  
      .slide-bar{ position: absolute;
        max-width: 601px;
        width: 100%;
        z-index:999;
      }
        .track{
                margin-top: -52px;
                background: #3c3737;
        }
        .track__title{
            margin-left:1rem;
        }
        .track__time {
            right: 14px
        }
        .pl-1{justify-content: start;}
.pl-2{justify-content: end;}
    }

   @media screen and (max-width:768px)
    {
              .read-more{display:block}
        .article .text.short {
   height: 86px;
   overflow: hidden;
}
        .pl-control button {

    padding: 0px 12px;
   
    font-size:20px;

}
.pl-control .play i{
    font-size:16px;
}
.btn-cn{
    font-size:18px;
}
    }
    
    #paragraph {
    position: relative;
    overflow: hidden;
    height: 65px;
    line-height: 1.3em;
    transition: height 0.3s;
    display:block;
  }

  #paragraph.expanded {
    height: auto;
  }

  /*#paragraph:after {*/
  /*  content: "";*/
  /*  background: linear-gradient(transparent, #646363);*/
  /*  position: absolute;*/
  /*  bottom: 0;*/
  /*  width: 100%;*/
  /*  height: 1.5em;*/
  /*}*/
   
  </style>
  
  <div class="bt-player" id="bt-player">
      <div class="d-flex pl-con ">
          <div class="pl-control musicContainer pl-1">
              <button id="prev-1"><i class="bi bi-skip-start"></i></button>
              <button id="play-1" class="play" style="font-size:26px"> <i class="fas fa-play"></i></button>
              <button id="next-1"><i class="bi bi-skip-end"></i></button>
              
          </div>
          <div class="d-flex slide-bar">
            <div class="track">
                  <div class="track__title" style="display:none"></div>
                  <div class="track__title_ads" style="display:none">Ads</div>
                  <div class="track__time">
                    <span id="durTime-1" class="track__time--current">00:00</span>
                    <span> / </span>
                    <span id="currTime-1" class="track__time--duration">00:00</span>
                  </div>
                  <!--<div class="progress-container-1-ads" id="abar" style="margin-top:0px">-->
                  <!--  <div class="progress-1">-->
                  <!--    <div class="progress__bar_1ads" style="width: 58%;"></div>-->
                  <!--    <div class="progress__preload_1" style="width: 59%;"></div>-->
                  <!--  </div>-->
                  <!--</div>-->
                  
                  <div class="progress-container-1" id='mbar'>
                    <div class="progress-1">
                      <div class="progress__bar_1 " style="width: 58%;"></div>
                      <div class="progress__preload_1" style="width: 59%;"></div>
                    </div>
                  </div>
            </div>
          </div>
          <div class="pl-control pl-2">
              
             
              <button id="forword1"><i class="bi bi-arrow-clockwise btn-cn"></i></button>
              <button id="rewind1"><i class="bi bi-arrow-counterclockwise btn-cn"></i></button>
              
          </div>
      </div>
  </div>
  
<!--flip book start  -->

<div id="book-container" class="book-container book-container-145">
  <div class="menu-panel">
    <h3 style="color:#000">Table of Contents</h3>
    <ul id="menu-toc" class="menu-toc is-perfect-scrollbar">
     
    </ul>
  </div>
  <div class="bb-custom-wrapper">
    <div id="bb-bookblock" class="bb-bookblock">
      
 
    </div>
    <nav>
      <span id="bb-nav-prev">&larr;</span>
      <span id="bb-nav-next">&rarr;</span>
    </nav>
    <span id="tblcontents" class="menu-button">
      <i class="fa fa-search"></i>
      <span>Show Chapters</span>
    </span>
    <span class="bb-nav-close cl">
      <!--<i class="fa fa-window-close" style="font-size:27px"></i>-->
      <i class="bi bi-x"></i>
    </span>
  </div>
</div>

<!--flip book end-->
  
  

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
  
  
  
//  let songArray; let songIndex;let songName;let adsDuration;let UserDuration;let songs = 0;let pro_id;let proaudio_id;  let likeCount = 1;
//  function load_player(id){
   
    
//     //  localStorage.removeItem("songslist");
//     //  localStorage.removeItem("songindex");
    
//     var songsArray = [];
//       $.ajax({
//       url:"{{ route('Onpage_play_audio') }}",
//       type:"post",
//       data:{id :id },
//       success:function(res){
//             document.getElementById('progress').style.width = 0;
//           console.log(res.result);
//           document.getElementById("audio11").src = '{{asset("uploads/product/audio")}}/'+res.result.audio.media_name;
//           document.getElementById('cover').src = '{{ asset("uploads/product/desktop-image")}}/'+res.result.audio.product.desktop_image;
//           document.getElementById('title').innerHTML = res.result.audio.title;
//           document.getElementById('countlink').innerHTML = res.result.audio.count_likes_count+" Like";
//           if(res.result.audio.count_likes_count > 0){
//               document.querySelector('.bi-suit-heart').classList.add('red-text');
//               likeCount = 2;
//           }
//           pro_id = res.result.audio.product_id;
//           proaudio_id = res.result.audio.id;
           
//           res.result.related_audio.forEach((val, index) => {
//              songsArray.push(val.media_name+'#'+val.title+'#'+val.id);
//           });
           
//           songs = songsArray;
//           songval = songs.indexOf(res.result.audio.media_name+'#'+res.result.audio.title+'#'+res.result.audio.id);
//           loadSong(songs[songval]);
//           //alert(songs[songval]);
//           //
//           if(res.result.audio.popup_status == 1){
//               // alert("status active");
//               document.getElementById("audioads").src = '{{asset("uploads/product/audio/attachment")}}/'+res.result.audio.product_ads.media_file;
//               adsDuration = res.result.audio.product_ads.after_time;
               
               
//           }
//           else{
//               adsDuration = false;
//           }
//           if(res.result.produration){
                
//               UserDuration = res.result.produration.duration_time;
//               // alert(UserDuration);
//               home_status(proaudio_id,pro_id);
//           }
//           else{
//                  UserDuration = false;
//           }
          
//           playSong();
//           $('#listview').modal('show');
//       },
//       error:function(text){
//           console.log(text.responseText);
//       }
//     });
//       // alert(rv);
//     }   

// //  click_hll.addEventListener('click', function(){
// //         console.log(rv);
// //   });

// function home_status(media,product){
//      $.ajax({
//       url:"{{ route('WatchhomeStatus') }}",
//       type:"post",
//       data:{ id : media, product_id : product},
//       success:function(res){
//         console.log(res);

//       },
//       error:function(res){
//         console.log(res.responseText);
//       }
//     });
// }


//   function get_playlist(id,proid){
//     $.ajax({
//       url:"{{ route('saveRecentlist') }}",
//       type:"post",
//       data:{ id : id, product_id : proid},
//       success:function(res){
//         console.log(res);
//         alert('Media Successfully add to playlist')
//       },
//       error:function(res){
//         console.log(res.responseText);
//       }
//     });

//   }

  
//      function like_list(){
//          let likeDislike;
//          if(likeCount == 1 || likeCount%2!=0){
//              likeDislike = 1;
//              $(document).find('.bi-suit-heart').addClass('red-text');
//              $(document).find('.bi-suit-heart').removeClass('grey-text');
//          }
//          if(likeCount%2==0){
//              likeDislike = 2;
//              $(document).find('.bi-suit-heart').removeClass('red-text');
//              $(document).find('.bi-suit-heart').addClass('grey-text');
//          }
         
         
       
//     $.ajax({
//       url:"{{ route('saveLikelist') }}",
//       type:"post",
//       data:{ id : proaudio_id, product_id : pro_id,likeDislike:likeDislike},
//       success:function(res){
        
//         if(res.status == 200){
//             $('#countlink').text(res.count+" Like");
//         }
//         //  document.querySelector('.bi-suit-heart').style.color = 'red';
//         // location.reload();
//       },
//       error:function(res){
//         console.log(res.responseText);
//       }
//     });
   
//     likeCount++;

//   }
  
 
  
 function get_value_in(id){
   // let id = $("#get_value").attr("data-id");
    $.ajax({
      url:"{{ route('saveRec') }}",
      type:"post",
      data:{ id : id},
      success:function(res){
        //console.log(res);
       
      },
      error:function(res){
        console.log(res.responseText);
      }
    });

  }
  
  $(document).ready(function(){

        $(".read-more").click(function(){

            var $elem = $(this).parent().find(".text");
            if($elem.hasClass("short"))
            {
                $elem.removeClass("short").addClass("full");
                $(".read-more").text('Read Less');

            }
            else
            {
                $elem.removeClass("full").addClass("short");
                 $(".read-more").text('.....Read More');

            }

        });
    });

//  $(document).ready(function() {
//     $('#readMoreButton').on('click', function() {
//       $("#paragraph").toggleClass("expanded");
//       if ($(this).text() == 'Read More') {
//          $(this).text('Read More');
//       } else {
//         // $(this).text('Read Less');
//         $(this).text('Read Less');
//       }
//     });
//   });
</script>
<script src="{{ asset('assets-front/js/media.js') }}"></script>


<script>

  // $window.on('throttledresize', function () {
  //   $('.is-perfect-scrollbar').perfectScrollbar('update');
  // });

var $window = $(window);
	var $document = $(document);
	var $html = $('html');
	var $body = $('body');
	var $footer = $('.footer');
	var isMobile = false;

  /**
  * ----------------------------------------------------------------------------------------
  *    Page Flip
  * ----------------------------------------------------------------------------------------
  */
   // Get URL Parameter
  function getUrlParameter(name) {
    var sPageURL = decodeURIComponent(window.location.search);
    return (RegExp(name + '=' + '(.*?)(&|$)').exec(sPageURL) || ['', ''])[1];
  }

  // Remove URL Parameter
  function removeUrlParameter(name) {
    var sPageURL = document.location.origin + document.location.pathname + decodeURIComponent(window.location.search);
    // var re = new RegExp('&' + name + '=\d+');
    var re = new RegExp('&' + name + '=(?:\\d+|\\w+)');
    sPageURL = sPageURL.replace(re, '');
    history.pushState({}, '', sPageURL);
  }

  /**
  * Returns a random integer between min (inclusive) and max (inclusive)
  * Using Math.round() will give you a non-uniform distribution!
  */
  function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  /**
  *  Shade Color
  */
  function shadeColor(color, percent) {
    var f = parseInt(color.slice(1), 16), t = percent < 0 ? 0 : 255, p = percent < 0 ? percent * -1 : percent, R = f >> 16, G = f >> 8 & 0x00FF, B = f & 0x0000FF;
    return "#" + (0x1000000 + (Math.round((t - R) * p) + R) * 0x10000 + (Math.round((t - G) * p) + G) * 0x100 + (Math.round((t - B) * p) + B)).toString(16).slice(1);
  }


    /**
  *  Converts rgba(xxx, xxx, xxx, x) to hex
  */
  function hexc(colorval) {
    var parts = colorval.match(/^rgba*\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(?:\d+)*.*(?:\d+)*)*\)$/);
    if (!parts) {
      return;
    }
    delete (parts[0]);
    for (var i = 1; i <= 3; ++i) {
      parts[i] = parseInt(parts[i]).toString(16);
      if (parts[i].length == 1) parts[i] = '0' + parts[i];
    }
    return '#' + parts.join('');
  }


  /**
  *  Checks of color is dark
  */
  function isColorDark(hexColor) {
    var c = hexColor.substring(1);      // strip #
    var rgb = parseInt(c, 16);   // convert rrggbb to decimal
    var r = (rgb >> 16) & 0xff;  // extract red
    var g = (rgb >> 8) & 0xff;  // extract green
    var b = (rgb >> 0) & 0xff;  // extract blue

    var luma = 0.2126 * r + 0.7152 * g + 0.0722 * b; // per ITU-R BT.709

    if (luma < 40) {
      return true;
    }
    return false;
  }


  /**
  *  Scroll in View
  */
  $.fn.inView = function () {
    var $this = this;
    var docViewTop = $window.scrollTop();
    var docViewBottom = docViewTop + $window.height();
    var elemTop = $this.offset().top;
    var elemBottom = elemTop + $this.height() + 160;
    if (((docViewTop <= elemBottom) && (docViewBottom >= elemTop)) || (isMobile == true)) {
      return true;
    }
    else {
      return false;
    }
  }

/**
  *  Get Parent Background
  */
  $.fn.getParentBG = function () {

    var $this = this;

    if ($this.children('.bg-color').length) {
      return $this.children('.bg-color').css("background-color");
    }

    // Is current element's background color set?
    var color = $this.css("background-color");
    if (color == 'transparent') {
      color = 'rgba(0, 0, 0, 0)';
    }
    if (color !== 'rgba(0, 0, 0, 0)') {
      // if so then return that color
      return color;
    }

    // are you at the body element?
    if ($this.is("body")) {
      // return known 'false' value
      return false;
    } else {
      // call getParentBG with parent item
      return $this.parent().getParentBG();
    }

  }

   /**
  * ----------------------------------------------------------------------------------------
  *    Perfect Scrollbar
  * ----------------------------------------------------------------------------------------
  */

  var $perfectScrollbars = '';

  function initPerfectScrollbar() {

    if ($perfectScrollbars != '') {
      $perfectScrollbars.perfectScrollbar('destroy');
    }

    $perfectScrollbars = $('.is-perfect-scrollbar');

    $perfectScrollbars.perfectScrollbar({
      minScrollbarLength: 25,
      maxScrollbarLength: 25,
      scrollYMarginOffset: 0,
      swipePropagation: false,
      wheelPropagation: false,
      suppressScrollX: true
    });

    $('.is-perfect-scrollbar').each(function () {

      var $this = $(this);
      var bgColor = $this.getParentBG();
      if (bgColor) {

        var bgColorHex = hexc(bgColor);
        if (!bgColorHex) {
          return;
        }
        if (isColorDark(bgColorHex)) {
          $this.find('.ps__scrollbar-y').css('border-color', '#fff');
          $this.find('.ps__scrollbar-y-rail').css('border-left', '3px solid #fff');
        } else {
          $this.find('.ps__scrollbar-y').css('border-color', '#000');
          $this.find('.ps__scrollbar-y-rail').css('border-left', '3px solid #000');
        }
      }
    })

    $('.is-perfect-scrollbar').each(function () {

      var $this = $(this);
      var bgColor = $this.getParentBG();

      if (bgColor) {
        $this.find('.ps__scrollbar-y').css('background-color', bgColor);
      }
    })

  }

  initPerfectScrollbar();

  // $(function() {
  function bookBlockPage() {
  var $container = $('.book-container'),
      $bookBlock = $('#bb-bookblock'),
      // $items = $bookBlock.children(),
      // itemsCount = $items.length,
      $items = $bookBlock.children(),
      itemsCount = $items.length,
      current = 0,
      bb = $('#bb-bookblock').bookblock({
        speed: 800,
        perspective: 2000,
        shadowSides: 0.8,
        shadowFlip: 0.4,
        onEndFlip: function (old, page, isLimit) {

          current = page;
          // update TOC current
          updateTOC();
          // updateNavigation
          setTimeout(function () {
            updateNavigation(isLimit);
            initPerfectScrollbar();
          }, 100)
        }
      }),
      $navNext = $('#bb-nav-next'),
      // $navPrev = $('#bb-nav-prev').hide(),
      $navPrev = $('#bb-nav-prev').hide(),
      $menuItems = $container.find('ul.menu-toc > li'),

      $tblcontents = $('#tblcontents'),
      transEndEventNames = {
        'WebkitTransition': 'webkitTransitionEnd',
        'MozTransition': 'transitionend',
        'OTransition': 'oTransitionEnd',
        'msTransition': 'MSTransitionEnd',
        'transition': 'transitionend'
      },
      transEndEventName = transEndEventNames[Modernizr.prefixed('transition')],
      supportTransitions = Modernizr.csstransitions;

      // ===========================
         function init() {

      // initialize perfectScrollbar on the content div of the first item
      initPerfectScrollbar();
      initEvents();
      $tblcontents.addClass('hovered');


      var readBookChapter = getUrlParameter('read-book-chapter');

      if (readBookChapter) {
        $('.book-container ul.menu-toc > li').eq(readBookChapter).trigger('click');
      }

      setTimeout(function () {
        $tblcontents.removeClass('hovered');
      }, 4000)


    }

     function initEvents() {

      // add navigation events
      $navNext.on('click', function () {
        bb.next();
         //config.$bookBlock.bookblock( 'next' );
        return false;
      });

      $navPrev.on('click', function () {
        bb.prev();
        return false;
      });

      // add swipe events
      $items.on({
        'swipeleft': function (event) {
          if ($container.data('opened')) {
            return false;
          }
          bb.next();
          return false;
        },
        'swiperight': function (event) {
          if ($container.data('opened')) {
            return false;
          }
          bb.prev();
          return false;
        }
      });
    }

    // show table of contents
      $tblcontents.on('click', toggleTOC);

      // show table of contents
      $tblcontents.on('hover', function () {
        $tblcontents.removeClass('hovered');
      });

      // click a menu item
      $menuItems.on('click', function () {

        var $el = $(this),
          idx = $el.index(),
          jump = function () {
            bb.jump(idx + 1);
          };

        current !== idx ? closeTOC(jump) : closeTOC();

        removeUrlParameter('read-book-chapter');
        var sPageURL = document.location.origin + document.location.pathname + decodeURIComponent(window.location.search);
        sPageURL += '&read-book-chapter=' + idx;
        history.pushState({}, '', sPageURL);

        return false;

      });


    // }

    function updateTOC() {
      $menuItems.removeClass('menu-toc-current').eq(current).addClass('menu-toc-current');
    }

    function updateNavigation(isLastPage) {

      if (current === 0) {
        $navNext.show();
        $navPrev.hide();
      }
      else if (isLastPage) {
        $navNext.hide();
        $navPrev.show();
      }
      else {
        $navNext.show();
        $navPrev.show();
      }

    }

    function toggleTOC() {
      console.log('toggleTOC');
      var opened = $container.data('opened');
      opened ? closeTOC() : openTOC();
    }

    function openTOC() {
      $navNext.hide();
      $navPrev.hide();
      console.log('openTOC');
      // $container.addClass( 'slideRight' );
      $container.addClass('slideRight').data('opened', true);
      // $container.data( 'opened', true );
      $tblcontents.find('span').text('hide Chapters');
      $tblcontents.find('i').removeClass('fa-search').addClass('bi bi-x');
      //$('.cl').css({"font-size": "51px","position": "absolute", "top": "-15px","left": "-10px"});
    }

    function closeTOC(callback) {
      console.log('closeTOC');

      updateNavigation(current === itemsCount - 1);
      $container.removeClass('slideRight').data('opened', false);
      $tblcontents.find('span').text("show chapter");
      $tblcontents.find('i').removeClass('bi bi-x').addClass('fa-search');
      // $tblcontents.find('i').removeClass('cl');
       //$('.fa-search').css({"font-size": "22px","position": "relative", "top": "3px","left": "-7px"});
      if (callback) {
        if (supportTransitions) {
          $container.on(transEndEventName, function () {
            $(this).off(transEndEventName);
            callback.call();
          });
        }
        else {
          callback.call();
        }
      }

    }



          return { init : init };
}
      // });
 // Page.init();
  
function ajax_content(id){
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  $('.book-container').css({"transform": "translateX(0%) !important", "-webkit-transform": "translateX(0%)"}); 
  
		var readBookID = getUrlParameter('read-book');

		if (!readBookID) {
			var sPageURL = document.location.origin + document.location.pathname;
			sPageURL += '?';
			sPageURL += '&read-book=' + id;
			history.pushState({}, '', sPageURL);
		}
		
	$.ajax({
      url:"{{ route('getChapter') }}",
      type:"post",
      data:{ id : id},
      success:function(res){
        console.log(res);
        res.result.forEach((val, index) => {
           // console.log(val);
          jQuery("#bb-bookblock").append('<div class="bb-item" id="item'+index+'"><div class="book-content"><div class="book-content-inner special-first-letter is-perfect-scrollbar"><h1 class="chapter-heading" style="color:#000">'+val.title+'</h1>'+val.description+'</div></div></div>'); 
          
          jQuery("#menu-toc").append(' <li><a href="#item'+index+'">'+val.title+'</a></li>'); 
          
        })
        var Page = bookBlockPage();
        Page.init();
      },
      error:function(res){
        console.log(res.responseText);
      }
    });
		
   
}





//  function get_value_in(id){
//   // let id = $("#get_value").attr("data-id");
//     $.ajax({
//       url:"{{ route('saveRec') }}",
//       type:"post",
//       data:{ id : id},
//       success:function(res){
//         console.log(res);
//         // let time = res.duration_time;
//         // let endTime = res.end_time;
//       },
//       error:function(res){
//         console.log(res.responseText);
//       }
//     });

//   }




$(document).on('click', '.bb-nav-close', function (event) {
		var $this = $(this);

		var sPageURL = document.location.origin + document.location.pathname;
		history.pushState({}, '', sPageURL);
		location.reload();

        $('.book-container').css({"transform": "translateX(-100%) !important", "-webkit-transform": "translateX(-100%)"}); 
		//$this.parents('.book-container').removeClass('showBook');

	//	$body.removeClass('body--disabled');
	})


	function autoOpenBook() {
		var readBookID = getUrlParameter('read-book');
		if (readBookID) {
		     ajax_content(readBookID);
			//$('.is-page-flip[data-post-id="' + readBookID + '"]').trigger('click');
		}
	}

	autoOpenBook();
	
	
	
	
</script>

@endsection

  @endsection