@extends('layouts.admin')
@section('content')

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
                <table class="table table-striped">
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
                        <a href="{{ route('editView',$category->id) }}" class="btn btn-info" title="Edit">Edit</a>
                        <a href="{{ route('removeCategory',$category->id) }}" class="btn btn-danger" title="Delete">Delete</a>

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
