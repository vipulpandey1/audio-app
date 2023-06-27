@extends('layouts.admin')
@section('content')
<style>
   .dataTables_length{
         padding:1rem;
     }
     .dataTables_length  label {
      display:flex;

     }
     .dataTables_length select{
      width:100%;
      max-width:200px;
      margin:0px 1rem
     }
     .dataTables_filter{
      display:flex;
      justify-content:end;
      margin-right:1rem;
     }
     .btn1{
      border:1px solid grey; 
      padding:0.5rem
     }
     .dataTables_info{
       padding:0.5rem
     }
     .dataTables_paginate{
      display:flex;
      justify-content:end;
      margin-right:1rem;
     }
     .dropzone .dz-message{
      color: black;
     }
</style>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">@if($proMedia)Edit  @else Add @endif Product Audio</h3>
                </div>
        <form method="post" action="{{ route('audioUpload') }}" enctype="multipart/form-data" id="subCategory">
          @csrf
          <div class="card-body">
            <input type="hidden" name="product_id" id="product_id" value="{{$productId}}"/>
        <input type="hidden" name="productMediaId" value="{{$proMedia}}">
              <div class="form-group">
              <label for="exampleInputPassword1">Title</label>
              <input type="text" name="title" class="form-control" id="exampleInputPassword1" placeholder="Enter Title"  value="{{ $media->title ?? ''}}">
              </div>
              <div class="form-group">
                <label for="Duration">Duration</label>
                <input type="time" name="duration"   class="form-control" id="duration" value="{{ $media->duration ?? ''}}">
              </div>

              
              
        


          </div>
              <!-- /.card-body -->
  
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
          </div>
  
       </div><!--/. container-fluid -->
      </section>
    <!-- /.content -->
@endsection
