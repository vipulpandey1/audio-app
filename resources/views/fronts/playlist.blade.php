@extends('layouts.frontend')
@section('content')
<style>
     .text-input{
        background:transparent;
        border:1px solid #515050;
        color:#fff;
    }
     .text-input::placeholder{font-size:16px !important;}
    .text-input:focus{background:#000;border:1px solid #515050;box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0);color:#fff;}
</style>
 <!--start page header-->
    <div class="filter-page-header">
         <div class="page-header-content py-5 bg-section-1" style="background: #202020 !important;margin-top: 105px;text-align:center;">
          <div class="container">
             
            <div class="row g-4">
              <div class="col-12 col-xl-12 order-2 order-lg-1">
              
                <div class="mt-5">
                    @if (Session::has('message'))
            <script>alert("Password Change Successfully")</script>
              @endif
                   <h3 class="fw-bold">My Play List</h3>
                   
                </div>
              </div>
              <!--<div class="col-12 col-xl-6 order-1 order-lg-2">-->
              <!--  <div class="page-header-banner p-1 bg-white">-->
              <!--    <img src="{{ asset('assets-front/images/page-header-banner.png')}}" class="img-fluid" alt="">-->
              <!-- </div>-->
              <!--</div>-->
            </div><!--end row-->
          </div>
        </div>
       
    </div>
    <!--end page header-->

    <!--start related Shows-->
    <div class="related-shows py-5 bg-section-1">
      <div class="container">
      
        <div class="shows-grid mt-4">
          <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-4">
             @foreach($rec as $rec1)
             <div class="col">
               <a href="{{ route('front_end_products',['url' => $rec1->product->url,'id' => $rec1->product->id]) }}">
                 <div class="card">
                   <img src="{{ asset('/uploads/product/desktop-image').'/'.$rec1->product->desktop_image }}" class="img-fluid" alt="...">
                   <div class="thumb-overlay">
                     <div class="remove-to-list">
                       <i class="bi bi-x-lg"></i>
                     </div>
                 </div>
                 </div>
               </a>
             </div>
             @endforeach

          </div><!--end row-->
        </div>
      </div>
    </div>
 <!--end related Shows-->

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