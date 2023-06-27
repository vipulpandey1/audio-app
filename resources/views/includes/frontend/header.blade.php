<header class="top-header">
    <nav class="navbar navbar-expand-xl w-100 navbar-dark">
      <a class="mobile-menu-btn d-inline d-xl-none " href="javascript:;" data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasNavbar">
      <i class="bi bi-list"></i>
    </a>
      <a class="navbar-brand  d-xl-inline" href="/"><img src="{{ asset('assets-front/images/logo-4.png') }}" width="110"
          alt=""></a>
    
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" style="background: transparent !important;">
        <div class="offcanvas-header">
          <div class="offcanvas-logo"><img src="{{ asset('assets-front/images/logo-4.png') }}" width="110" alt="">
          </div>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body primary-menu">
          <ul class="navbar-nav justify-content-center flex-grow-1 gap-1">
              <li class="nav-item">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('front_end_category',5) }}">Short Story</a>
            </li>
           
            
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                Reading
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('front_end_category',11) }}">English</a></li>
                <li><a class="dropdown-item" href="{{ route('front_end_category',12) }}">Hindi</a></li>
         
              </ul>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="{{ route('front_end_category',9) }}">
                Audio Books
              </a>
             
            </li>
            
          </ul>
        </div>
      </div>
      <ul class="navbar-nav secondary-menu flex-row gap-lg-2 gap-4" >
        <li class="nav-item">
          <a class="nav-link srch" href="{{ route('search') }}"><i class="bi bi-search"></i></a>
        </li>
      

@if(!empty(Auth::guard('user')->user()) && Auth::guard('user')->user()->role_id == 2)
        <li class="nav-item">
          <a class="nav-link" href="javascript:;" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><img src="{{ asset('assets-front/images/avt.png') }}" class="img-user" style="margin-top: -5px;padding:0.2rem;border-radius:100%;"></a>
        </li>
@else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('loginFrontEnd') }}"><i class="bi bi-power me-md-1 me-0"></i><span
              class="d-none d-md-inline">Login</span></a>
        </li>
      @endif
      
      </ul>
    </nav>
  </header>
  <div class="container-fluid desk-top">
      <ul class="d-flex top-cat">
          <li><a href="{{ route('front_end_category',5) }}">SHORT STORIES</a></li>
          <li><a href="{{ route('front_end_category',6) }}" class="d-none">WEB SERIES</a></li>
          <li><a href="{{ route('front_end_category',11) }}">ENGLISH READING</a></li>
          <li><a href="{{ route('front_end_category',12) }}">HINDI READING</a></li>
          <li><a href="{{ route('front_end_category',9) }}">AUDIO BOOK</a></li>
          
      </ul>
  </div>