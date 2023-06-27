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
</style>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sub Category List</h3>
                <a href="{{ route('addViewsub') }}" class="btn btn-primary float-right" title ="Add Sub Category">Add Sub Category </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4" style="margin:auto;padding:0rem 0px;">
                <table class="table table-striped" id="example1">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Name</th>
                      <th>Title</th>
                      <th>Status</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subcategory as $key=>$category)
                    <tr>
                      <td>{{ $key + 1}}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->title }}</td>
                      <td>
                        <div class="form-group">
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input toggle-button" data-url="{{ route('changeStatus') }}" id="customSwitch1-{{$key}}" data-id="{{$category->id}}" {{ $category->status == 1 ? "CHECKED" : ""}} name="status">
                            <label class="custom-control-label" for="customSwitch1-{{$key}}"></label>
                          </div>
                        </div>
                      </td>
                      <td style="display:flex">
                        <a href="{{ route('editViewsub',$category->id) }}" title="Edit" class="btn1"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('removesubCategory',$category->id) }}" class="btn1" style="color:red" title="Delete"><i class="fa fa-trash"></i></a>

                      </td>
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            </div>

        
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    @endsection
