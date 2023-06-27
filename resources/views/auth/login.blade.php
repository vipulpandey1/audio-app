<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css
    ">
    <script src="https://use.fontawesome.com/f59bcd8580.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js
"></script>

</head>
<body style="background-image: url({{ asset('assets/side.png') }}); max-height: 525px;">
      <div class="containers" >
        <div class="row no-gutters shadow-lg " style="height:100%;" >
         
        <div class="p-5" style="width:100%;display:flex;justify-content:center;flex-wrap:wrap;">
          
          <div class="form-style" style="width:100%;max-width:500px;background:rgba(255,255,255,0.5);padding:5rem;margin-top:5rem;">
          <h3 class="pb-3 text-center" style="width:100%">Suno Kahaniya</h3>
              <form method="post" action="{{ route('loginUser') }}">
                @csrf
                  <div class="form-group pb-3">    
                    <input type="email" placeholder="Email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">   
                  </div>
                  <div class="form-group pb-3">   
                    <input type="password" placeholder="Password" name="password" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="d-flex align-items-center justify-content-between">
                {{-- <div class="d-flex align-items-center"><input name="" type="checkbox" value="" /> <span class="pl-2 font-weight-bold">Remember Me</span></div> --}}
                {{-- <div><a href="#">Forget Password?</a></div> --}}
                </div>
                <div class="pb-2">
                  <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Submit</button>
                </div>
              </form>
        {{-- <div class="sideline">OR</div> --}}
        {{-- <div>
        <button type="submit" class="btn btn-primary w-100 font-weight-bold mt-2"><i class="fa fa-facebook" aria-hidden="true"></i> Login With Facebook</button>
        </div> --}}
        {{-- <div class="pt-4 text-center">
        Get Members Benefit. <a href="#">Sign Up</a>
      </div> --}}
    </div>
      
      </div>
      </div>
      </div>
   

</body>
</html>