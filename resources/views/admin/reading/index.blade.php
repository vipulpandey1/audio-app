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
      <div class="row">
          <div class="col-md-12">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product List</h3>
                <a href="{{ route('readingAdd') }}" class="btn btn-primary float-right" title ="Add Product">Add Product </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped" id="example1">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Img</th>
                      <th>Name</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Subcategory</th>
                      <!--<th>Trending</th>-->
                      <!--<th>Recommendation</th>-->
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subcategory as $key=>$category)
                   
                    <tr>
                      <td>{{ $key + 1}}</td>
                      <td><img src="{{ asset('/uploads/product/desktop-image/'.$category->desktop_image) }}" style="max-width:30px;"></td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->title }}</td>
                      <td> {{$category->category->name}}</td>
                      <td> {{$category->subcategory->name}}</td>
                      <!--<td>-->
                      <!--  <div class="form-group">-->
                      <!--    <div class="custom-control custom-switch">-->
                      <!--      <input type="checkbox" class="custom-control-input toggle-button-ft" data-url="{{ route('product.FeaturechangeStatus') }}" id="customSwitch11-{{$key}}" data-id="{{$category->id}}" {{ $category->f_status == 1 ? "CHECKED" : ""}} name="f_status">-->
                      <!--      <label class="custom-control-label" for="customSwitch11-{{$key}}"></label>-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--</td>-->
                      
                      <!--<td>-->
                      <!--  <div class="form-group">-->
                      <!--    <div class="custom-control custom-switch">-->
                      <!--      <input type="checkbox" class="custom-control-input toggle-button" data-url="{{ route('product.changeStatus') }}" id="customSwitch1-{{$key}}" data-id="{{$category->id}}" {{ $category->status == 1 ? "CHECKED" : ""}} name="status">-->
                      <!--      <label class="custom-control-label" for="customSwitch1-{{$key}}"></label>-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--</td>-->
                      <td style="display:flex">
                        <!-- <a data-toggle="modal" data-target="#modal-default" class="btn1 complaint-media" data-id="{{ $category->id }}" data-name="{{ $category->name }}"><i class="fas fa-paperclip pl-1"></i></a> -->
                      <a class="btn1 " href="{{ route('reading.get-list',$category->id) }}"><i class="fas fa-paperclip pl-1"></i></a> 

                        <a href="{{ route('readingEdit',$category->id) }}" class="btn1" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('removereading',$category->id) }}" class="btn1" style="color:red" title="Delete"><i class="fa fa-trash"></i></a>

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

            <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Audio Upload</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Title</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                    </div>

                    <div>
                      <label class="block uppercase text-gray-600 text-xs font-bold mb-2"
                      htmlfor="grid-password">Upload files here <span class="text-red-500">*</span></label>
                      <form action="{{ route('product.media') }}" class="dropzone border-0 rounded-sm  "
                      style="border: 1px solid rgb(229 231 235);" id="my-dropzone">
                      <input type="file" name="file" style="display: none;">
                      <input type="hidden" name="product_id" id="product_id" />
                      <input type="hidden" name="product_media_id" id="product_media_id" />
                          

                        </form>
                      </div>
                    </div>

                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')



@endsection