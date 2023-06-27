@extends('layouts.frontend')
@section('content')

<style>
  #play i{
    color: #fff;
    font-size: 25px;
  }
  #progress-container{
    background: #fff;
    border-radius: 5px;
    cursor: pointer;
    margin: 10px 0;
    height: 5px;
    width: 100%;
  }
  #progress{
    height:5px !important;
    background:blue;
  }
  .play-contol {
    margin-top: 1.8rem;
}
</style>
<section class="mob">
    <div class="mob-inner">
  <div class="pic">
<div class="container music-container" id="music-container">
  
  <div id="devItem" style="display:none"></div>
  <input type="hidden" id="pro_id" value="{{$audio->product_id}}">
   <input type="hidden" id="audio_id" value="{{$audio->id}}">
  <div class="d-flex justify-content-center">
 <audio src="{{asset('uploads/product/audio/'.$audio->media_name)}}" id="audio11"></audio>
<div class="col-lg-12">
  <img src="{{ asset('uploads/product/desktop-image/'.($audio ? $audio->product ? $audio->product->desktop_image : '' : ''))}}" class="card-img" alt="" /> 
 
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
  <span id="buffer" style="display:none"><img src="{{asset('assets-front/images/load-spinner.gif')}}" style="max-width: 27px;position:absolute;right: 20px;top: 99px;"></span>
  <!--<p>Constance Timon</p>-->
</div>
 <a href="" class="gray-color"><svg  width="22" height="22" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
  <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
</svg> </a>
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
<!--      <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-skip-backward prev" viewBox="0 0 16 16">-->
<!--  <path d="M.5 3.5A.5.5 0 0 1 1 4v3.248l6.267-3.636c.52-.302 1.233.043 1.233.696v2.94l6.267-3.636c.52-.302 1.233.043 1.233.696v7.384c0 .653-.713.998-1.233.696L8.5 8.752v2.94c0 .653-.713.998-1.233.696L1 8.752V12a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5zm7 1.133L1.696 8 7.5 11.367V4.633zm7.5 0L9.196 8 15 11.367V4.633z"/>-->
<!--</svg>-->
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
<!--      <svg  fill="currentColor" class="bi bi-skip-forward next" viewBox="0 0 16 16">-->
<!--  <path d="M15.5 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V8.752l-6.267 3.636c-.52.302-1.233-.043-1.233-.696v-2.94l-6.267 3.636C.713 12.69 0 12.345 0 11.692V4.308c0-.653.713-.998 1.233-.696L7.5 7.248v-2.94c0-.653.713-.998 1.233-.696L15 7.248V4a.5.5 0 0 1 .5-.5zM1 4.633v6.734L6.804 8 1 4.633zm7.5 0v6.734L14.304 8 8.5 4.633z"/>-->
<!--</svg>-->
      
      <img src="{{asset('assets-front/images/next.png')}}" class="btn-n-p">
      </a>
  
  </div>
  </div>
  </div>
</div>
</div>
</section>

<div class="movies-thumb-slider bg-section-2 py-3 container" style="margin-top:4rem;  @if($audio->product->category_id == 5) {{ 'display:none' }} @endif">
    
    <div class="movies-1" style="padding-left:0px">
    <div class="d-flex align-items-center position-relative heading-rel-abs">
        <h4 class="mb-0-1">Episodes</h4>
      </div>
      @if (!empty($related_audio))
      @php  unset($songs); $songs = array(); 
     
       @endphp
      @foreach($related_audio as $key => $row1)
      
      <div class="episod py-2 border-bottom @if($row1->id == $audio->id) {{ 'bg-section-1' }}   @else {{'bg-section-2'}}  @endif"" style="padding:8px">
        <div class="episod-pic">
          @if(!empty($products->desktop_image))
          @php $img = asset('uploads/product/desktop-image/'.$products->desktop_image); @endphp
             @else
             @php $img = asset('images/audio1.jpg/'); @endphp
             @endif
            <img src="{{ asset('uploads/product/desktop-image/'.$audio->product->desktop_image)}}"  alt="" width="66" height="66"/> 
            <div class="episod-text">
              <h6>{{$row1->title}}  </h6>
              <p>Duration 11 minutes</p>
            </div>
          </div>
        <a href="{{ route('front_play_audio',$row1->id) }}"><svg width="22" height="22" fill="currentColor" class="bi bi-play-circle" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z"/>
        </svg></a>
      </div>
      @php array_push($songs,$row1->media_name.'#'.$row1->title); @endphp
    @endforeach
    @endif
    
   
    </div>
</div>
</div>

<style>
    .footer-section{display:none;}
    body{background:#000}
    .btn-n-p{
        max-width:30px;
    }
</style>
<script>
  let songIndex = @php echo array_search ($audio->media_name.'#'.$audio->title, $songs) @endphp;
  // const songs = ['{{$audio->media_name}}'];
  const songs = @php echo json_encode($songs) @endphp;
  const title_songs = ['{{$audio->title}}'];
  
  </script>

@if(!empty(Auth::guard('user')->user()) && Auth::guard('user')->user()->role_id == 2 && !empty($produration->duration_time))
<script>

  //const durationProductTime = @php echo $audio->productDuration->duration_time  @endphp;
  const durationProductTime = @php echo $produration->duration_time  @endphp;
</script>
@else
<script>
localStorage.removeItem("mycurrentTime");
localStorage.removeItem("myendTime");
</script>
@endif
@section('scripts')


@endsection
@endsection