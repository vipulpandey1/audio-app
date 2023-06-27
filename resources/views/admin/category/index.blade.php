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
                <h3 class="card-title">Category List</h3>
                <a href="{{ route('addView') }}" class="btn btn-primary float-right" title ="Add Category">Add Category </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped" id="example1">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Name</th>
                      <th>Title</th>

                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($category as $key=>$category)
                    <tr>
                      <td>{{ $key + 1}}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->title }}</td>

                      <td>
                        <a href="{{ route('editView',$category->id) }}" class="btn1" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('removeCategory',$category->id) }}" class="btn1" style="color:red;" title="Delete"><i class="fa fa-trash"></i></a>

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
  <!-- /.content-wrapper -->
  @endsection
