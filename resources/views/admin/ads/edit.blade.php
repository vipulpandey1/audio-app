@extends('layouts.admin')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Media</h3>
              </div>
                @php
                    $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
                    $videoExtensions = ['mp4'];
                @endphp
      <form method="post" action="{{ route('saveAdsMedia') }}" enctype="multipart/form-data" id="subCategory">
        @csrf
        <input type="hidden" name="id" value="{{ $valMedia->id }}">
        <div class="card-body row">
            <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $valMedia->title  }}" name="title" placeholder="Title">
            </div>
            <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Set Time</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $valMedia->after_time  }}" name="after_time" placeholder="Title">
            </div>
           
            <div class="form-group col-md-6" id="categoryDiv">
                <label for="exampleInputPassword1">Products</label>
                <select name="product_id" class="form-control select2"  id="category" data-url="{{ route('DropdownProductMedia') }}" onchange="MediaDropdown(event,'product_id')">
                            <option value="">Please select</option>
                             @foreach ($product as $val)
                            
                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                            @endforeach
                            
                        </select>
            </div>

            <div class="form-group col-md-6" >
                <label for="exampleInputPassword1">Sub Category</label>
               <select class="form-control" name="pro_media_id" id="pro_media" >
               </select>
            </div>


           
            <div class="form-group col-md-6">
                <label for="desktop_image">Upload Media</label>
                <div class="input-group">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" name="media_file" id="desktop_image">
                    <label class="custom-file-label" for="desktop_image">Choose file</label>
                    </div>
                    <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>


           
            <div class="row" style="width:100%">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Audio</div>
                        <div class="card-body">
                              @php 
                         $explodeImage = pathinfo('/uploads/product/audio/attachment/'.$valMedia->media_file, PATHINFO_EXTENSION);
                         @endphp
                          @if(in_array($explodeImage, $imageExtensions))
                          <img src="{{asset('uploads/product/audio/attachment/'.$valMedia->media_file)}}" class="img-fluid h-50 w-50" id="image-popup" alt="" style="max-width:30px">
                        @elseif(in_array($explodeImage, $videoExtensions))
                            <video width="50" height="50" controls id="myAudio">
                			  <source src="{{asset('uploads/product/audio/attachment/'.$valMedia->media_file)}}" type="video/mp4">
                			  <source src="movie.ogg" type="video/ogg">
                			Your browser does not support the video tag.
                			</video>
                          @else
                          <audio id="myAudio" class="w-100" controls>
                          <source src="{{asset('uploads/product/audio/attachment/'.$valMedia->media_file)}}" type="audio/ogg">
                            <source src="{{asset('uploads/product/audio/attachment/'.$valMedia->media_file)}}" type="audio/mpeg">
                          </audio>
                          
                          @endif
                        </div>

                    </div>
                </div>
                <div class="col-md-2"></div>
               
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
    @section('scripts')
    <script>
        document.getElementById('category').value = '{{ $valMedia->product_id  }}';
        MediaDropdown1("{{ route('DropdownProductMedia') }}",'{{ $valMedia->product_id  }}','{{ $valMedia->pro_media_id  }}');
        
    </script>
    @endsection
