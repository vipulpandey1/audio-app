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
      justify-content:end;   .dataTables_length{
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
      <div class="row">
          <div class="col-md-12">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product Audio List</h3>
                <a href="{{ route('audioIndex',$productId) }}" class="btn btn-primary float-right" title ="Add Audio Product">Add Audio Product </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped" id="example1">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Title</th>
                      <th>Duration</th>
                      <th>Audio</th>
                      <th>Pop Up</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($accountMedias as $key=>$category)
                    <tr>
                      <td>{{ $key + 1}}</td>
                      <td>{{ $category->title }}</td>
                      <td>{{ $category->duration ?? '-' }}</td>

                      <td>
                      @if(!empty($category->media_name))
                        <audio controls>
                          <source src="{{asset('uploads/product/audio/'.$category->media_name)}}" type="audio/ogg">
                          <source src="{{asset('uploads/product/audio/'.$category->media_name)}}" type="audio/mpeg">
                        </audio>
                        @endif
                      </td>
                      <td>
                        <div class="form-group d-flex">
                          <label for="no">No</label>
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input toggle-button-popup" data-url="{{ route('product.changePopUpStatus') }}" id="customSwitch1-{{$key}}" data-id="{{$category->id}}" {{ $category->popup_status == 1 ? "CHECKED" : ""}} name="popup_status">
                            <label class="custom-control-label" for="customSwitch1-{{$key}}"></label>
                          </div>
                          <label for="yes">Yes</label>
                        </div>

                        <a data-toggle="modal" data-target="#popup-default" class="btn1 popup-media {{ $category->popup_status == 1 ? '' :'d-none'}}" data-id="{{ $category->id }}"
                          data-product_id="{{ $category->product_id }}" title="upload attachment" data-name="{{ $category->title }}"><i class="fas fa-paperclip pl-1"></i></a> 
                          
                          <a target="_blank" href="{{ asset('uploads/product/audio/attachment/'.$category->popup_file) }}" title="view attachment" class="btn1  {{ $category->popup_status == 1 ? '' :'d-none'}}" >{{ $category->title }}</a>
                          
                      </td>
                      <td>
                        <a class="btn1" href="{{ route('audioIndex',[$category->product_id,$category->id])}}"><i class="fas fa-edit"></i></a>
                         <a data-toggle="modal" data-target="#modal-default" class="btn1 complaint-media" data-id="{{ $category->id }}"
                          data-product_id="{{ $category->product_id }}" data-name="{{ $category->title }}"><i class="fas fa-file-audio pl-1"></i></a> 

                        
                        <a href="{{ route('del.product.media',$category->id) }}" class="btn1" style="color:red" title="Delete"><i class="fa fa-trash"></i></a>

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

      </div><!--/. container-fluid -->
    </section>
    <div class=""> <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Audio Upload</h4>
            <button type="button" class="close popupClose" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
           

            <div>
              <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
              htmlfor="grid-password">Upload files here <span class="text-red-500">*</span></label>
              <form action="{{ route('product.media') }}" class="dropzone border-0 rounded-sm  "
              style="border: 1px solid rgb(229 231 235);" id="my-dropzone">
              @csrf
              <input type="file" name="file" style="display: none;">
              <input type="hidden" name="product_id" id="product_id" />
              <input type="hidden" name="product_media_id" id="product_media_id" />
                  

                </form>
              </div>
            </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default popupClose" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div></div>
    <!-- /.content -->


    <div class=""> <div class="modal fade" id="popup-default" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Popup Attachment</h4>
            <button type="button" class="close popupClose" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
          </div>
          <div class="modal-body">
           

            <form action="{{ route('product.pop_up_attach_media') }}" method="post" enctype="multipart/form-data">
            <div>
              <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
              htmlfor="grid-password">Upload files here <span class="text-red-500">*</span></label>
              @csrf
             
              <input type="file" name="popupFile" class="form-control">
              <input type="hidden" name="product_id" id="popup_product_id" />
              <input type="hidden" name="product_media_id" id="popup_product_media_id" />
                  

            </div>
          </div>
          
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default popupClose" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>

          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div></div>

@endsection

@section('scripts')

<script>
  $(document).find('.removedfile').addClass('hidden');
  var fileList = new Array;
  var i = 0;
  var accountId;
  let myDropzone = new Dropzone("#my-dropzone", {
      // Setup chunking
      maxFiles:1,
      parallelUploads: 1,  // since we're using a global 'currentFile', we could have issues if parallelUploads > 1, so we'll make it = 1
      maxFilesize: 1024,   // max individual file size 1024 MB
      chunking: true,      // enable chunking
      forceChunking: true, // forces chunking when file.size < chunkSize
      parallelChunkUploads: true, // allows chunks to be uploaded in parallel (this is independent of the parallelUploads option)
      chunkSize: 2000000,  // chunk size 2,000,000 bytes (~2MB)
      retryChunks: true,   // retry chunks on failure
      retryChunksLimit: 3, // retry maximum of 3 times (default is 3)
      // dictRemoveFile: "X"

    });

  // sending method
  myDropzone.on('sending', function(file, xhr, formData) {
      formData.append("product_id", accountId);
      formData.append("_token", jQuery('meta[name="csrf-token"]').attr('content'));
  })

  Dropzone.autoDiscover = false;
  // success 
  myDropzone.on('success', function(file, responseText) {
     
      $(document).find("#product_id").val(accountId);
      fileList[i] = {
          "serverFileName": responseText.name,
          "fileName": file.name,
          "fileId": i
      };
      i++;
  })



  // complaint media sidebar view
  $(document).ready(function() {
      $(document).on("click", ".complaint-media", function(e) {
          $('.dz-preview').remove();
          $('#my-dropzone').removeClass('dz-started');
          e.preventDefault();

          $('.modal-title').text("Audio Upload : "+ $(this).attr('data-name'));
  
          let productId = $(this).attr('data-product_id');
          let id = $(this).attr('data-id');
          $('#product_id').val(productId);
          $('#product_media_id').val(id);
      });
  });

  $(document).ready(function() {
      $(document).on("click", ".popup-media", function(e) {
         
          e.preventDefault();

          $('.modal-title').text("Popup Media Upload : "+ $(this).attr('data-name'));
  
          let productId = $(this).attr('data-product_id');
          let id = $(this).attr('data-id');
          $('#popup_product_media_id').val(id);
          $('#popup_product_id').val(productId);

      });
  });


  $(document).on('click','.popupClose',function(){
    window.location.reload();
  })
</script>


@endsection
