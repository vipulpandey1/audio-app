@extends('layouts.admin')
@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
      <form method="post" action="{{ route('saveCategory') }}" enctype="multipart/form-data" id="category">
        @csrf
        <div class="card-body">
            <div class="row">
            <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputPassword1" placeholder="Enter Title">
            </div>
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Meta</label>
            <textarea  class="form-control" name="meta" id="exampleInputPassword1" placeholder="Enter Meta"></textarea>
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea  class="form-control" name="matter1" id="exampleInputPassword1" placeholder="Enter Description"></textarea>
            </div>
            <div class="row">
            <div class="form-group col-md-6">
                <label for="desktop_image">Desktop Image</label>
                <div class="input-group">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" name="desktop_image" id="desktop_image">
                    <label class="custom-file-label" for="desktop_image">Choose file</label>
                    </div>
                    <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="mobile_image">Mobile Image</label>
                <div class="input-group">
                    <div class="custom-file">
                    <input type="file" class="custom-file-input" id="mobile_image" name="mobile_image">
                    <label class="custom-file-label" for="mobile_image">Choose file</label>
                    </div>
                    <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
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

  @endsection