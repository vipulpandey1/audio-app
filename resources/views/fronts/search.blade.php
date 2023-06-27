@extends('layouts.frontend')
@section('content')

<section class="py-5 bg-section-2">
  <div class="container">
     <div class="d-flex align-items-center search-area" style="width:100% !important;">
        <div class="btn-new">
           <a href="javascript:void(0)" class="back-btn" onclick="history.back()" aria-label="Close">
               <img src="{{asset('assets-front/images/search-icon-image.png')}}" style="max-width: 25px;">
           </a>
        </div>
        <div class="ms-auto">
           
          <!--<a href="javascript:void(0)" class="back-bt" onclick="history.back()" aria-label="Close"><i class="fas fa-arrow-left"></i></a>-->
        </div>
     
      <div class="search-box position-relative" >
          
        <div class="position-absolute position-absolute top-50 start-0 translate-middle ms-4 fs-8"><i class="bi bi-search sr"></i></div>
        <input class="form-control ps-5" id="search_value" type="text" placeholder="Type to search">
      </div>
      </div>
  </div>
</section>

<!--<section class="py-5">-->
<!--  <div class="container">-->
<!--     <h5 class="mb-0 fw-bold">Explore by categories</h5>-->
<!--      <div class="search-categories mt-4">-->
<!--         <div class="row row-cols-1 row-cols-lg-3 row-cols-xl-4 g-4">-->
<!--           <a class="col" href="{{route('front_end_category',5)}}">-->
<!--             <div class="card border-0 shadow bg-green">-->
<!--               <div class="card-body p-4">-->
<!--                  <div class="d-flex align-items-center">-->
<!--                     <div>-->
<!--                        <h5 class="mb-0 fw-bold text-white">Short Stories</h5>-->
<!--                      </div> -->
<!--                      <div class="ms-auto fs-1 text-white">-->
<!--                      <i class="bi bi-boombox"></i>-->
<!--                    </div> -->
<!--                  </div>-->
<!--               </div>-->
<!--             </div>-->
<!--             </a>-->
<!--            <a class="col" href="{{route('front_end_category',6)}}">-->
<!--            <div class="card border-0 shadow bg-pink">-->
<!--              <div class="card-body p-4">-->
<!--                 <div class="d-flex align-items-center">-->
<!--                    <div>-->
<!--                       <h5 class="mb-0 fw-bold text-white">Web Series</h5>-->
<!--                     </div> -->
<!--                     <div class="ms-auto fs-1 text-white">-->
<!--                        <i class="bi bi-cast"></i>-->
<!--                     </div> -->
                    
<!--                 </div>-->
<!--              </div>-->
<!--            </div>-->
<!--            </a>-->
<!--            <a class="col" href="{{route('front_end_category',7)}}">-->
<!--            <div class="card border-0 shadow bg-skyblue">-->
<!--              <div class="card-body p-4">-->
<!--                 <div class="d-flex align-items-center">-->
<!--                    <div>-->
<!--                       <h5 class="mb-0 fw-bold text-white">Reading Book</h5>-->
<!--                     </div> -->
<!--                    <div class="ms-auto fs-1 text-white">-->
<!--                      <i class="bi bi-film"></i>-->
<!--                    </div> -->
<!--                 </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </a>-->
<!--          <a class="col" href="{{route('front_end_category',9)}}">-->
<!--            <div class="card border-0 shadow bg-purple">-->
<!--              <div class="card-body p-4">-->
<!--                 <div class="d-flex align-items-center">-->
<!--                    <div>-->
<!--                       <h5 class="mb-0 fw-bold text-white">Audio Book</h5>-->
<!--                     </div> -->
<!--                    <div class="ms-auto fs-1 text-white">-->
<!--                      <i class="bi bi-music-note-beamed"></i>-->
<!--                    </div> -->
<!--                 </div>-->
<!--              </div>-->
<!--            </div>-->
<!--            </a>-->
          
<!--         </div>-->

       
      


<!--      </div>-->
<!--  </div>-->
<!--</section>-->
<style>
.search-area{
    margin-top:2rem;
}
    #search_value{
        background:transparent;
        border:1px solid #515050;
        color:#fff;
    }
     #search_value::placeholder{font-size:16px !important;}
    #search_value:focus{background:#000;border:1px solid #515050;box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0);color:#fff;}
    .sr {color:#fff;}
    .ui-widget-content{
        background:#000 !important;
        border:0px !important;
        color:#fff !important;
    }
     .ui-widget-content li{
         border-bottom:1px solid rgba(255,255,255,0.2);
     }
     .footer-section{display:none;}
     .back-btn{color:#fff}
     .btn-new{
             margin-top: 91px
         position: absolute;
         top:0px;
         z-index:999;
    
     }
     .offcanvasNavbar,.offcanvas-body,#offcanvasNavbar,.mobile-menu-btn,.secondary-menu{
         display:none !important;
     }
     .navbar-dark .navbar-brand{
         margin:auto !important;
     }
     .top-header,.bg-section-2{margin-top:0rem;}
     .search-box{
         //margin-top:3rem !important;
         width:93%;
     }
     @media screen and (max-width:1200px)
    {
     .search-area{
         margin-top:0px;
     }
         .btn-new{
         margin-top: -9px !important;
         }
         .search-box{
           margin-top:-10px !important;  
         }
     
    }
      @media screen and (max-width:650px)
    {
         .btn-new{
         margin-left: -1rem;
         }
    }
         
            @media screen and (max-width:440px)
        {
         .search-box{
                 width: 90%;
         }
         
        
    }
</style>
@section('scripts')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
   $("#search_value").autocomplete({
        source: function( request, response ) {
          
           $.ajax({
             url:"{{ route('searchResult') }}",
             type: 'get',
             dataType: "json",
             data: {
                terms: request.term
             },
             success: function( data ) {
                response( data );
             }
           });
        },
        select: function (event, ui) {
          $("#search_value").val(ui.item.label); // display the selected text
          let count = 0;
         let myInterval =  setInterval(() => {
            window.location.href = "/suno-kahaniya/audio/"+ui.item.url;
            count++;

            if (count == 1) {
                stopCount();
            }
          }, 1000);
          function stopCount() {
            clearInterval(myInterval);
        }
          return false;       
        }
     });
  </script>
<script>
    
// var path = "{{ route('searchResult') }}";
//     $('input.typeahead').typeahead({
//         source: function(terms,process){
//             return $.get(path,{terms:terms},function(data){
//                  return process(data);
//                 //console.log(data);
//             })
//         },
//     })
</script>
@endsection
@endsection