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
<body>
      <div class="container" >
        <div class="row m-5 no-gutters shadow-lg " >
          <div class="col-md-6 d-none d-md-block">
            <img src="{{ asset('assets/main.jpeg') }}" class="img-fluid" style="min-height:100%;" />
          </div>
        <div class="col-md-6 bg-white p-5">
          <h3 class="pb-3 text-center">Suno Kahaniya</h3>
          <div class="form-style">
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