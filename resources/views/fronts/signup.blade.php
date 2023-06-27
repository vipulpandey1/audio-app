@extends('layouts.frontend')
@section('content')
<!--<div class="login-bg-overlay au-sign-in-basic"></div>-->
<section class="login-section py-5 bg-section-2">
   <div class="container">
    <div class="d-flex align-items-center access-con">
      
      <div class="access-con-box-2" style="">
           <div class="card radius-10 shadow-sm" style="border-radius:0px !important;">
          <div class="card-body p-4">
            <div class="text-center">
              <h4>Sign Up</h4>
              <p>Creat New account</p>
            </div>
            
            <form class="form-body row g-3" method="post" action="{{ route('registerUser')}}">
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
              @if (Session::has('message'))
             <center style="color:#fff">{{ session('message') }}</center>
              @endif
              <div class="col-12">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" name="name" class="form-control text-input" id="name" placeholder="Your name">
                <span class="has-err" id="nameErr"></span>
              </div>
              <div class="col-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control text-input" name="email" id="email" placeholder="abc@example.com">
                <span class="has-err" id="emailErr"></span>
              </div>
              <div class="col-12">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control text-input" name="password" id="password" placeholder="Your password">
                <span class="has-err" id="passwordErr"></span>
              </div>
              <div class="col-12 col-lg-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="term" name="term" id="flexCheckChecked">
                  <label class="form-check-label" for="flexCheckChecked">
                    I agree the Terms and Conditions
                  </label><br>
                  <span class="has-err" id="termagreeErr"></span>
                </div>
              </div>
              <div class="col-12 col-lg-12">
                <div class="d-grid">
                    <button type="submit" name="insert" class="btn btn-black btn-block mt-20" id="submitnew" style="display: none"></button>
                  <button type="button" class="btn btn-theme" id="submitbtn" >Sign Up</button>
                </div>
              </div>
              <div class="col-12 col-lg-12 text-center">
                <p class="mb-0 desktop_hide">Already have an account? <a href="{{ route('loginFrontEnd') }}">Sign in</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="access-con-box-1" style="">
          
        <div class="card cr1" style="">
          <div class="cr-new">
              <h2 class="text-white text-center">Hello Friends!</h2>
              <p class="text-white text-center">Enter your personal details and start journey with us</p>
              <a href="{{ route('loginFrontEnd') }}" class="btn btn-new-1">Signin</a>
          </div>
        </div>
      
      </div>
    </div>
  </div>
</section>
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




@section('scripts')
  <script>
$("#submitbtn").click(function(){
    $(".has-err").text("");
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();


    var err = 0;
  if(name == ''){
    $('#nameErr').text('Please enter Your name');
    $('#name').focus();
    err = err+1;
  }

  if(email == ''){
    $('#emailErr').text('Please enter Email');
    $('#email').focus();
    err = err+1;
  }
 
  if(password == ''){
    $('#passwordErr').text('Enter password');
    $('#password').focus();
    err = err+1;
  }
  
 
    if($('input[name="term"]:checked').length == 0){
        $('#termagreeErr').text('You must agree the terms and condition');
        $('#termagree').focus();
        err = err+1;
    }
     
  if(err == 0){
    $(".has-err").text("");
     jQuery("#submitnew").trigger("click");
     
  }
});

    </script>
@endsection

@endsection