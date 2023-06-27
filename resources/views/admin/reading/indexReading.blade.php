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
                <h3 class="card-title">Reading Chapter List</h3>
                <a href="{{ route('readingchapterAdd',$productId) }}" class="btn btn-primary float-right" title ="Add Audio Product">Add Chapter </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped" id="example1">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Title</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($accountMedias as $key=>$reading)
                    <tr>
                      <td>{{ $key + 1}}</td>
                      <td>{{ $reading->title }}</td>
                

                    
                      <td>
                        <a class="btn1" href="{{ route('readingchapterAdd',[$reading->product_id,$reading->id])}}"><i class="fas fa-edit"></i></a>
                      

                        
                        <a href="{{ route('del.reading.chapter',$reading->id) }}" class="btn1" style="color:red" title="Delete"><i class="fa fa-trash"></i></a>

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




@endsection
