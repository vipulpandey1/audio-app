@extends('layouts.frontend')
@section('content')

<section class="paly-page bg-section-1"  style="padding-top:6rem">
    <div class="container">
        <div class="d-flex justify-content-center">
        <div class="col-md-3 play-araa ">
          @if (!empty($products->desktop_image))
            
          <img src="{{ asset('uploads/product/desktop-image/'.$products->desktop_image)}}" class="card-img" alt="" /> 
          @endif
            <div class="d-flex justify-content-center gap-2 pt-3 text-center">
           
                <div>
                @if(!empty($products->audios[0]))    
                  <a href="{{ route('front_play_audio',$products->audios[0]->id) }}" class="btn btn-theme-white">Play Now </a>
                  @endif
                </div>
                <div>
                  <a href="#" class="btn btn-light-2 btn-theme-white1"><i class="bi bi-plus-lg me-1"></i>Library</a>
                </div>
              
              </div>
              <div class="py-3 text-center">
                <h2 class="show-title">{{$products->title ?? ''}}</h2>
                @if(!empty($products->author))
                <p class="show-para mb-0"><span class="gry-color">Author:</span> {{$products->author}}</p>
                @endif
                @if(!empty($products->narrator))
                <p class="show-para mb-0"><span class="gry-color">Narrator:</span> {{$products->narrator}}</p>
                @endif
                @if(!empty($products->genre))
                <p class="show-para mb-0"><span class="gry-color">Genre:</span> {{$products->genre}}</p>
                @endif
                @if(!empty($products->duration))
                <p class="show-para mb-0"><span class="gry-color">Duration:</span> {{$products->duration}}</p>
                @endif
               
                  
             </div>
        </div>
        </div>
        
         <div class="movies-thumb-slider bg-section-1 py-3 descri">
   
        <div class="movies-1">
        <h4> Description  </h4>
        @php echo $products->description @endphp
       
    
          </div>
   

   </div>
   
   

   
  @if($products->category->id != 5)
  <div class="movies-thumb-slider bg-section-1 py-3">
    
        <div class="movies-1">
        <div class="d-flex align-items-center position-relative heading-rel-abs">
            <h4 class="mb-0-1">Episodes</h4>
          </div>
          @if (!empty($products->audios))
            
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
            <a href="{{ route('front_play_audio',$row1->id) }}"><svg width="22" height="22" fill="currentColor" class="bi bi-play-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z"/>
            </svg></a>
          </div>
        @endforeach
        @endif
        
       
        </div>
    </div>
    @endif
 </div>

   
   <!--...........-->
    </div>
</section>
  <!--start slider-->
 
 
  

  <!--start slider-->
  <section class="movies-thumb-slider bg-section-2">
    <div class="container">
      <div class="d-flex align-items-center position-relative heading-rel-abs">
        <div>
          <h3 class="mb-0">Similar Listening</h3>
        </div>
        <div class="ms-auto"><a href="#" class="more-videos-link btn"><span class="d-none d-md-inline">More</span><span><i class="bi bi-chevron-double-right d-inline d-md-none"></i></span></a></div>
      </div>
        <div class="movies-thumbs-block movieNEw">
       <div class="movies-inner-block ">      

  
@foreach($products_all as $row) 
@if($row->sub_category_id == $products->sub_category_id && $row->id !== $products->id) 
<div class="card">
  <a href=" {{ route('front_end_products',$row->url) }}" onclick="get_value_in('{{ $row->sub_category_id}}')" id="get_value">  <img src="{{ asset('/uploads/product/desktop-image').'/'.$row->desktop_image }}" class="card-img" alt=""/></a>
  
</div>
@endif
@endforeach


         </div>
      </div>
    </div>
  </section>
  <!--end slider-->

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
</script>
@endsection

  @endsection