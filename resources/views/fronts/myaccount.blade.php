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
 
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content" style="background:#000;box-shadow:1px 2px 8px #fff;text-align:center">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('changePs')}}" method="post">
            @csrf
            <input type="hidden" class="form-control" name="userid" value="{{Auth::guard('user')->user()->id}}"><br>
            
            <input type="text" class="form-control text-input" name="password" required><br>
            <input type="submit" value="change password" class="btn btn-danger">
        </form>
      </div>
     
    </div>
  </div>
</div>


<section class="login-section py-5 bg-section-2">
   <div class="container">
    <div class="d-flex align-items-center access-con">
      <div class="access-con-box-1" style="">
          
        <div class="card cr1" style="">
          <div class="cr-new">
              <h2 class="text-white text-center">{{ Auth::guard('user')->user()->name}}</h2>
              <p class="text-white text-center">{{ Auth::guard('user')->user()->email}}</p>
              <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-new-1">Change Password</a>
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
@endsection