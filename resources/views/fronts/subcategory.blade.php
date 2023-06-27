@extends('layouts.frontend')
@section('content')
<style>
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
     .card-sub{padding-right: 12px;}
    .card-img-sub{max-width:197px;width:100%;border-radius:5px;}
    .sub-cat-con{padding-left: 23px;}
    .p-l-15{
        padding:15px;
    }
     @media screen and (max-width:500px)
    {
        .card-img-sub{max-width:100px;}
    }
     @media screen and (max-width:768px)
    {
        .img-container1 {
        min-height:300px;
    }
    }
    .d-flex{
        display:flex;
        flex-wrap:wrap;
    }
   
    
</style>
 <!--start slider-->
 @if(@$category['slider'] != NULL)
 <section class="slider-section">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    
      <div class="carousel-inner">
        @foreach ($category->slider as $key=>$val)
        <div class="carousel-item {{$key == 0 ?  'active' : '' }}">
            <a href="{{!empty($val->link) ? $val->link : "" }}"><div class="img-container1"></div></a>
         
            <picture>
              <source media="(min-width:650px)" srcset="{{ asset('uploads/slider/category/'.$val->category_id.'/'.$val->image) }}">
              <source media="(min-width:350px)" srcset="{{ asset('uploads/slider/category/mobile/'.$val->category_id.'/'.$val->mobile_image) }}">
               <img src="{{ asset('uploads/slider/category/'.$val->category_id.'/'.$val->image) }}" class="d-block w-100" alt="...">
            </picture>
        </div>
        @endforeach
          
     
        {{-- <div class="carousel-item {{ $key ? 'active' : '' }}">
          <img src="{{ asset('uploads/slider/category/'.$slider->category_id.'/'.$slider->image) }}" class="d-block w-100" alt="...">
          <div class="carousel-caption ">
            <h1 class="show-title">Indian Army</h1>
            <p>Category: Crime/Thriller</p>
            <a href="#" ><img src="{{asset('assets-front/images/btn-ply.png')}}"/></a>
          </div>
        </div> --}}
   
     
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
  @else
  @endif
  <!--end slider-->
  


  


  @if(@$category['product'] != NULL)


<!--start slider-->
<section class="sub_cat bg-section-1 p-l-15 top-slider-ve">
    <div class="container">
      <div class="align-items-center position-relative">
        <div>
          <h3 class="mb-0">{{$category->name}}</h3>
        </div>
       
       
       <!--<div class="d-flex sub-cat-con">-->
        <div class="row">
          @foreach($category->product as $row1) 
          <!--<div class="card-sub">-->
           <div class="col-md-3 col-lg-2 col-sm-4 col-xs-6" style="padding:0.5rem;margin:0px">
            <a href=" {{ route('front_end_products',['url' => $row1->url,'id' => $row1->id]) }}" onclick="get_value_in('{{ $row1->sub_category_id}}')" id="get_value">  <img src="{{ asset('/uploads/product/desktop-image').'/'.$row1->desktop_image }}" class="card-img-subs img-fluid" alt=""/></a>
            
          </div>
        @endforeach
      
        
         </div>
    </div>
  </section>
@endif

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