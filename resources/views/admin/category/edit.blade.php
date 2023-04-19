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
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
      <form method="post" action="{{ route('saveCategory') }}" enctype="multipart/form-data" id="category">
        @csrf
        <input type="hidden" name="id" value="{{ $category->id }}">
        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $category->name  }}" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text" value="{{ $category->title  }}" name="title" class="form-control" id="exampleInputPassword1" placeholder="Enter Title">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Meta</label>
            <textarea  class="form-control" name="meta" id="exampleInputPassword1" placeholder="Enter Meta">{{ $category->meta }}</textarea>
            </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea  class="form-control" name="description" id="exampleInputPassword1" placeholder="Enter Description">{{ $category->description }}</textarea>
            </div>
            <div class="form-group">
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


            <div class="form-group">
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
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Desktop Image</div>
                        <div class="card-body">
                            <img src="{{ asset('/storage/desktop-image').'/'.$category->desktop_image }}" alt="" class="img-fluid">
                        </div>

                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Mobile Image</div>
                        <div class="card-body">
                            <img src="{{ asset('/storage/mobile-image').'/'.$category->mobile_image }}" alt="" class="img-fluid">
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
