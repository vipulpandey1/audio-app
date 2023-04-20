@extends('layouts/admin')
<div class="content-wrapper">

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Simple Tables</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sub Category List</h3>
                <a href="{{ route('addViewsub') }}" class="btn btn-primary float-right" title ="Add Category">Add Category </a>
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
                    @foreach($subcategory as $key=>$category)
                    <tr>
                      <td>{{ $key + 1}}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->title }}</td>

                      <td>
                        <a href="{{ route('editViewsub',$category->id) }}" class="btn btn-info" title="Edit">Edit</a>
                        <a href="{{ route('removesubCategory',$category->id) }}" class="btn btn-danger" title="Delete">Delete</a>

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
  </div>
  <!-- /.content-wrapper -->
