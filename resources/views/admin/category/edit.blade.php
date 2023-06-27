@extends('layouts.admin')
@section('content')
<style>
       .d-flex{
    display:flex;
    flex-wrap:wrap;
 }
 .w33{
    max-width:200px;
    width:100%;
    margin:1rem
 }
</style>

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
            <div class="row">
            <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $category->name  }}" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Title</label>
            <input type="text" value="{{ $category->title  }}" name="title" class="form-control" id="exampleInputPassword1" placeholder="Enter Title">
            </div>
            <div class="form-group col-md-12">
            <label for="exampleInputPassword1">Meta</label>
            <textarea  class="form-control" name="meta" id="exampleInputPassword1" placeholder="Enter Meta">{{ $category->meta }}</textarea>
            </div>

            <div class="form-group col-md-12">
            <label for="exampleInputPassword1">Description</label>
            <textarea  class="form-control" name="matter1" id="exampleInputPassword1" placeholder="Enter Description">{{ $category->description }}</textarea>
            </div>
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
            <div class="d-flex">
                <div class="w33">
                    <div class="card">
                        <div class="card-header">Desktop Image</div>
                        <div class="card-body">
                            <img src="{{ asset('/uploads/desktop-image').'/'.$category->desktop_image }}" alt="" class="img-fluid">
                        </div>

                    </div>
                </div>
             
                <div class="w33">
                    <div class="card">
                        <div class="card-header">Mobile Image</div>
                        <div class="card-body">
                            <img src="{{ asset('/uploads/mobile-image').'/'.$category->mobile_image }}" alt="" class="img-fluid">
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

  @endsection
