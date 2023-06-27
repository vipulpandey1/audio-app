@extends('layouts.frontend')
@section('content')
<!--<div class="login-bg-overlay au-sign-in-basic"></div>-->
<section class="login-section py-5 bg-section-2">
   <div class="container">
    <div class="d-flex align-items-center access-con">
      <div class="access-con-box-1" style="">
          
        <div class="card cr1" style="">
          <div class="cr-new">
              <h2 class="text-white text-center">Welcome back!</h2>
              <p class="text-white text-center">To Keep connected with us please login with your personal information</p>
              <a href="{{ route('usersignup') }}" class="btn btn-new-1">Signup</a>
          </div>
        </div>
      
      </div>
      <div class="access-con-box-2" style="">
         
        <div class="card radius-10 shadow-sm" style="border-radius:0px !important;">
          <div class="card-body p-4" >
            <div class="text-center">
              <h4>Sign In</h4>
              <p>Sign In to your account</p>
               @if (Session::has('msg'))
              <p>{{ session('msg') }}</p>
              @endif
            </div>
            <form class="form-body row g-3" action="{{ route('loginFrontEndUser') }}" method="post">
            @csrf
              <div class="col-12 col-lg-12">
                <div class="d-grid gap-2">
                  <a href="{{url('/authorized/google')}}" class="btn border border-2 border-dark"><img
                      src="{{ asset('assets-front/images/google.png') }}" width="20" alt=""><span class="ms-3 fw-500 text-white">Sign in with
                      Google</span></a>
                  <a href="javascript:;" class="btn border border-2 border-dark"><img
                      src="{{ asset('assets-front/images/facebook.png') }}" width="20" alt=""><span class="ms-3 fw-500 text-white">Sign
                      in with Facebook</span></a>
                </div>
              </div>
              <div class="col-12 col-lg-12">
                <div class="position-relative border-bottom my-3">
                  <div class="position-absolute seperator-2 translate-middle-y">OR</div>
                </div>
              </div>
              <div class="col-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" name="email" class="form-control text-input" id="inputEmail" placeholder="abc@example.com">
              </div>
              <div class="col-12">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control text-input" id="inputPassword" placeholder="Your password">
              </div>
              <!--<div class="col-12 col-lg-6">-->
              <!--  <div class="form-check form-switch">-->
              <!--    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckRemember">-->
              <!--    <label class="form-check-label" for="flexSwitchCheckRemember">Remember Me</label>-->
              <!--  </div>-->
              <!--</div>-->
              <div class="col-12 col-lg-12 text-end">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Forgot Password?</a>
              </div>
              <div class="col-12 col-lg-12">
                <div class="d-grid">
                  <button type="submit" class="btn btn-theme">Sign In</button>
                </div>
              </div>
              <div class="col-12 col-lg-12 text-center">
                <p class="mb-0 desktop_hide">Don't have an account? <a href="{{ route('usersignup') }}">Sign up</a></p>
              </div>
            </form>
          </div>
        </div>
      
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-black" id="staticBackdropLabel">Forgot Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('forgot')}}" method="post">
            @csrf
            <input type="email" class="form-control" name="email" placeholder ='Enter Your Email' >
            <center><input type="submit" class="btn btn-theme mt-4" value="Reset Password"></center>
        </form>
      </div>
     
    </div>
  </div>
</div>
<style>
.bg-section-21{
   // background-color: #000000 !important;
//background-image: url("https://www.transparenttextures.com/patterns/light-sketch.png") !important;
}
    .card{
        //background: #171717;
         background: rgba(0,0,0,0.5);
             box-shadow: 0 .125rem .25rem rgba(0, 0, 0, 0)!important;
    }
        .text-input{
        background:#000 !important;
        border:1px solid #515050 !important;
        color:#fff;
    }
    .text-input:focus{background:#000;border:1px solid #515050;box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0) !important;color:#fff;}
    .seperator-2{
        background:#000;
    }
    .btn-new-1{
        padding:0.5rem 2rem;
        font-size:16px;
        color:#fff;
        border-radius:50px;
        border:1px solid #fff;
    }
    .access-con{
        background:#000;max-width:1200px;justify-content:center;margin:82px auto auto;
    }
    .access-con-box-1{
       flex-grow:1;max-width:600px;width:100%;text-align:center;
    }
    .access-con-box-2{
        flex-grow:1;max-width:600px;width:100%;
        background:#171717;
    }
    
    .cr1{
        margin-top: 82px;background:#000;margin:0rem 0px 0px 0px;min-height:543px;border-radius:0px !important;padding:2rem
    }
    .cr-new{
        margin-top:225px;margin-bottom:-250px
    }
</style>
@endsection