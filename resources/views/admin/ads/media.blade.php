@extends('layouts.admin')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ads List</h3>
                <a  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary float-right" title ="Insert Ads">Insert Ads </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Title</th>
                      <th>Media</th>

                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                      $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
                      $videoExtensions = ['mp4'];
                      @endphp
                    @foreach($ads as $key=>$row)
                    <tr>
                      <td>{{ $key + 1}}</td>
                      <td>{{ $row->title }}</td>
                      <td>
                         @php 
                         $explodeImage = pathinfo('/uploads/product/audio/attachment/'.$row->media_file, PATHINFO_EXTENSION);
                         @endphp
                          @if(in_array($explodeImage, $imageExtensions))
                          <img src="{{asset('uploads/product/audio/attachment/'.$row->media_file)}}" class="img-fluid h-50 w-50" id="image-popup" alt="" style="max-width:30px">
                        @elseif(in_array($explodeImage, $videoExtensions))
                            <video width="50" height="50" controls id="myAudio">
                			  <source src="{{asset('uploads/product/audio/attachment/'.$row->media_file)}}" type="video/mp4">
                			  <source src="movie.ogg" type="video/ogg">
                			Your browser does not support the video tag.
                			</video>
                          @else
                          <audio id="myAudio" class="w-100" controls>
                          <source src="{{asset('uploads/product/audio/attachment/'.$row->media_file)}}" type="audio/ogg">
                            <source src="{{asset('uploads/product/audio/attachment/'.$row->media_file)}}" type="audio/mpeg">
                          </audio>
                          
                          @endif
                        
                      </td>


                      <td>
                  
                         <a href="{{route('EditAds',$row->id)}}" class="btn1" title="Edit"  ><i class="fa fa-edit"></i></a>
                        <a href="{{ route('MediaremoveAds',$row->id) }}" class="btn1" style="color:red" title="Delete"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            </div>

        
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->



      <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="{{ route('product.popup_attach_insert') }}" enctype="multipart/form-data" method="post">
        @csrf
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Insert Ads</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                     </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Products</label>
                        <select name="product_id" class="form-control select2"  id="category" data-url="{{ route('DropdownProductMedia') }}" onchange="MediaDropdown(event,'product_id')">
                            <option value="">Please select</option>
                             @foreach ($product as $val)
                            
                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group" id="categoryDiv">
                        <label for="exampleInputPassword1">Product Media</label>
                        <select class="form-control" name="pro_media_id" id="pro_media" >
                           
                                
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="file">Upload File</label>
                        <div class="input-group">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" name="popupFile" id="file">
                            <label class="custom-file-label" for="file">Choose file</label>
                            </div>
                            <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

    


  @endsection

  @section('scripts')

  <script>
  $(function () {
    //Initialize Select2 Elements
    	$(".select2").select2({
    dropdownParent: $("#exampleModal"),
    theme: 'bootstrap4',
  });
  
  

    //Initialize Select2 Elements
    $('.select2bs4').select2({
         dropdownParent: $("#editModel"),
        
      theme: 'bootstrap4'
    })
  })    
     $(document).on('change','select[name="type"]',function(){
    //   let $this = $(this);
    //   if($this.val() == 2){
    //     $('#categoryDiv').removeClass('d-none');
    //   }else{
    //     $('#categoryDiv').addClass('d-none');

    //   }
    //Initialize Select2 Elements
   
     });
  </script>
  @endsection
  <!-- /.content-wrapper -->
