@extends('layouts.admin')
@section('content')

<style>
    .d-flex{
    display:flex;
    flex-wrap:wrap;
 }
 .w33{
    max-width:300px;
    width:100%;
    margin:1rem
 }
</style>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Sub Category</h3>
              </div>
      <form method="post" action="{{ route('saveCategorysub') }}" enctype="multipart/form-data" id="subCategory">
        @csrf
        <input type="hidden" name="id" value="{{ $subcategory->id }}">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $subcategory->name  }}" name="name" placeholder="Enter Name">
                </div>
                <div class="form-group col-md-6">
                <label for="exampleInputPassword1">Title</label>
                <input type="text" value="{{ $subcategory->title  }}" name="title" class="form-control" id="exampleInputPassword1" placeholder="Enter Title">
                </div>
                
            </div>
            
            <div class="row">
                <div class="form-group col-md-12" id="categoryDiv">
                    <label for="exampleInputPassword1">Category</label>
                    <select name="category_id" class="form-control" id="category" >
                        <option value=""> Please select</option>
                        @foreach ($category as $val)
                        
                        <option value="{{ $val->id }}" {{ $subcategory->category_id == $val->id ? "selected" :""}}>{{ $val->name }}</option>
                        @endforeach
                            
                    </select>
                </div>
            </div>
            <div class="row">
            <div class="form-group col-md-12">
                <label for="home-check">Show on Home</label>
                <input type="checkbox"  id="home-check" value="1" name="show_home" @if($subcategory->show_home == 1) {{ 'checked' }} @endif  >
            </div>
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Meta</label>
            <textarea  class="form-control" name="meta" id="" placeholder="Enter Meta">{{ $subcategory->meta }}</textarea>
            </div>

            

            <div class="row">
            <div class="form-group col-md-12">
                <label for="exampleInputPassword1">Description</label>
                <textarea  class="form-control" name="description" id="matter1" placeholder="Enter Description">{{ $subcategory->description }}</textarea>
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
                            <img src="{{ asset('/uploads/desktop-image').'/'.$subcategory->desktop_image }}" alt="" class="img-fluid">
                        </div>

                    </div>
                </div>
                
                <div class="w33">
                    <div class="card">
                        <div class="card-header">Mobile Image</div>
                        <div class="card-body">
                            <img src="{{ asset('/uploads/mobile-image').'/'.$subcategory->mobile_image }}" alt="" class="img-fluid">
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
