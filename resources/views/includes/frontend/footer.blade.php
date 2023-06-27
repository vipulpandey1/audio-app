  <!--start footer-->
  <section class="footer-section py-5 bg-foot">
    <div class="container">
   
       <div class="my-5"></div>
       <div class="row g-4">
        <div class="col-md-4 col-12">
          <div class="footer-widget-6" style="padding-bottom:0px">
            <img src="{{ asset('assets-front/images/logo-4.png') }}" class="mb-4" width="110" alt="">
          
             <p class="mb-2">Introducing Suno Kahaniyan an audio OTT platform, your go-to destination for short-length audio content spanning different genres. So, join us and discover the joys of bite-sized audio entertainment and knowledge with our Audio OTT platform.</p>
             <a class="text-theme" href="#">Read More</a>
             <div class="mob-follow-links">
                    <h5 class="mb-3 fw-bold">Follow Us</h5>
                    <div class="social-link d-flex align-items-center gap-2">
                          <a href="#" style="background:#1773ea;color:#fff"><i class="bi bi-facebook"></i></a>
                       <a href="#" style="background:#27a3e0;color:#fff"><i class="bi bi-twitter"></i></a>
                       <a href="#" style="background:#0a63bc;color:#fff"><i class="bi bi-linkedin"></i></a>
                       <a href="#" style="background:red;color:#fff"><i class="bi bi-youtube"></i></a>
                       <a href="#" style=" background:white; background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);"><i class="bi bi-instagram"></i></a>
                       <!---webkit-background-clip: text;background-clip: text;-webkit-text-fill-color: transparent;-->
                    </div>
            
                    <div class="mt-4">
                        <h5 class="mb-0">Support</h5>
                        <p class="mb-0 text-muted">support@sunokahaniyan.com</p>
                    </div>
                    <!--<div class="">-->
                    <!--    <h5 class="mb-0">Toll Free</h5>-->
                    <!--    <p class="mb-0 text-muted">1800- 8xx 2xx</p>-->
                    <!--</div>-->
             </div>
          </div>
        </div>
        <!--<div class="col-md-1 d-none d-md-block">-->
            
        <!--</div>-->
        <div class="col-md-3 col-12 ps-md-5">
          <div class="footer-widget-8" style="padding-top:0px">
            <h5 class="mb-3 fw-bold">Useful Links</h5>
             <ul class="widget-link list-unstyled">
               <li><a href="#">Home</a></li>
               <li><a href="#">About</a></li>
               <li><a href="#">Privacy Policy</a></li>
               <li><a href="#">Terms & Conditions</a></li>
             
             </ul>
          </div>
        </div>
        <!--<div class="col">
          <div class="footer-widget-7">
            <h5 class="mb-3 fw-bold">Explore</h5>
             <ul class="widget-link list-unstyled">
               <li><a href="#">Drama</a></li>
               <li><a href="#">Love Story</a></li>
               <li><a href="#">Crime/Thriller</a></li>
               <li><a href="#">Horror</a></li>
               <li><a href="#">Book Summary</a></li>
               <li><a href="#">Kids</a></li>
               <li><a href="#">Historical</a></li>
             </ul>
          </div>
          
          
          
        </div>-->
       
        <div class="col-md-4 col-12">
          <div class="footer-widget-9 alter">
            <h5 class="mb-3 fw-bold">Follow Us</h5>
             <div class="social-link d-flex align-items-center gap-2">
               <a href="#" style="background:#1773ea;color:#fff"><i class="bi bi-facebook"></i></a>
               <a href="#" style="background:#27a3e0;color:#fff"><i class="bi bi-twitter"></i></a>
               <a href="#" style="background:#0a63bc;color:#fff"><i class="bi bi-linkedin"></i></a>
               <a href="#" style="background:red;color:#fff"><i class="bi bi-youtube"></i></a>
               <a href="#" style=" background:white; background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);color:#fff"><i class="bi bi-instagram"></i></a>
             </div>

             <div class="mb-4 mt-4">
              <h5 class="mb-0">Support</h5>
              <p class="mb-0 text-muted">support@sunokahaniyan.com</p>
             </div>

             <!--<div class="">-->
             <!-- <h5 class="mb-0">Toll Free</h5>-->
             <!-- <p class="mb-0 text-muted">1800- 8xx 2xx</p>-->
             <!--</div>-->

          </div>
        </div>
       </div><!--end row-->
       <div class="my-5"></div>
       <div class="align-items1"><p class="mb-0 text-muted ">Copyright © 2023, All Right Reserved</p></div>


    </div>
  </section>
  <!--end footer-->
  <!--Start Back To Top Button-->
  <a href="javaScript:;" class="back-to-top" style="z-index:99"><i class="bi bi-arrow-up"></i></a>
<!--End Back To Top Button-->

<!--start switcher-->
@if(!empty(Auth::guard('user')->user()) && Auth::guard('user')->user()->role_id == 2)
      
  <div class="switcher-body">
    <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false"
      tabindex="-1" id="offcanvasScrolling">
      <div class="offcanvas-header border-bottom" style="background:transparent;padding-left:0px;">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel">
            <div class="d-flex">
            <img src="{{ asset('assets-front/images/avt.png') }}" class="img-user"> 
            <div style="margin-left:0.5rem">{{Auth::guard('user')->user()->name}}<span style="display:block;width:100%;font-size:12px;margin-top:-5px">{{Auth::guard('user')->user()->email}}</span>
            </div>
            </div></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
 
        
        <div class="header-colors-indigators">
          <div class="row row-cols-auto g-3 m-account">
            
            <div class="col">
            <a href="{{route('myaccount')}}"><i class="bi bi-gear-fill me-md-1 me-0"></i> My Account</a>
            </div>
            <div class="col">
             <a href="{{route('Myplaylist')}}"><i class="bi bi-list me-md-1 me-0"></i> Play List</a>
            </div>
            <div class="col">
              <a href="{{ route('mylikeList') }}"><i class="bi bi-heart me-md-1 me-0"></i> Like List</a>
            </div>
              <div class="col">
          <a href="{{ route('logoutFrontEndUser') }}"><i class="bi bi-power me-md-1 me-0"></i><span
              class=" d-md-inline">Logout</span></a>
        </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  @endif
  <!--end switcher-->
  
  <script>
    document.onkeydown = function(e) {
  if(event.keyCode == 123) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
     return false;
  }
}

window.addEventListener('contextmenu', function (e) {
  e.preventDefault();
}, false);

window.addEventListener('keydown', function(event) {
    if (event.keyCode === 80 && (event.ctrlKey || event.metaKey) && !event.altKey && (!event.shiftKey || window.chrome || window.opera)) {
        event.preventDefault();
        if (event.stopImmediatePropagation) {
            event.stopImmediatePropagation();
        } else {
            event.stopPropagation();
        }
        return;
        }
        
        
}, true);


</script>