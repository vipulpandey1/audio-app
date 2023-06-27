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
              <h4>Reset Password</h4>
            
            </div>
            @if($errors->any())
            @foreach($errors->all() as $error)
            <p style="color:red">{{$error}}</p>
            @endforeach
            @endif
            <form class="form-body row g-3" method="post" action="{{ route('passwordResetFinal')}}">
                @csrf
              
              
              @if (Session::has('message'))
             <center>{{ session('message') }}</center>
              @endif
              <input type="hidden" name="token" value="{{$_REQUEST['token']}}">
              
              <div class="col-12">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control text-input" name="password" id="inputPassword" placeholder="Your password">
              </div>
              <div class="col-12">
                <label for="inputPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control text-input" name="password_confirmation" id="inputPassword" placeholder="Confirm password">
              </div>
              
              <div class="col-12 col-lg-12">
                <div class="d-grid">
                  <button type="submit" class="btn btn-theme">Set Password</button>
                </div>
              </div>
             
            </form>
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
        max-width:1200px;justify-content:center;margin:82px auto auto;
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