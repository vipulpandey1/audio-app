@extends('layouts.admin')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Slider List</h3>
                <a  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary float-right" title ="Add Slider">Add Slider </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                      <th>Title</th>
                      <th>Link</th>
                       <th>Image</th>
                      <th>Mobile Image</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($slider as $key=>$slider)
                    <tr>
                      <td>{{ $key + 1}}</td>
                      <td>{{ $slider->title }}</td>
                      <td>{{ $slider->link }}</td>
                      <td>
                        @if(isset($slider->category_id))
                          <img style="width: 5rem;" src="{{ asset('uploads/slider/category/'.$slider->category_id.'/'.$slider->image) }}" class="rounded img-fluid  d-block" alt="">
                          @else

                          <img style="width: 5rem;" src="{{ asset('uploads/slider/'.$slider->image) }}" class="rounded img-fluid  d-block" alt="">

                          @endif
                      </td>
                       <td>
                        @if(isset($slider->category_id))
                          <img style="width: 5rem;" src="{{ asset('uploads/slider/category/mobile/'.$slider->category_id.'/'.$slider->mobile_image) }}" class="rounded img-fluid  d-block" alt="">
                          @else

                          <img style="width: 5rem;" src="{{ asset('uploads/slider/mobile/'.$slider->mobile_image) }}" class="rounded img-fluid  d-block" alt="">

                          @endif
                      </td>


                      <td>
                        <a href="{{ route('removeSlider',$slider->id) }}" class="btn btn-danger" title="Delete">Delete</a>

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



      <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form action="{{ route('addSliderImage') }}" enctype="multipart/form-data" method="post">
        @csrf
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                     </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Link</label>
                        <input type="text" name="link" class="form-control" id="title" placeholder="Enter Link">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Type</label>
                        <select name="type" class="form-control" id="type" >
                            <option value=""> Please select</option>
                            <option value="1">Home Page</option>
                            <option value="2">Category Page</option>
                        </select>
                    </div>
                    <div class="form-group d-none" id="categoryDiv">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="category" class="form-control" id="category" >
                            <option value=""> Please select</option>
                            @foreach ($category as $val)
                            
                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                            @endforeach
                                
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="file">Desktop Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="file">
                            <label class="custom-file-label" for="file">Choose file</label>
                            </div>
                            <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="file_mobile">Mobile Image</label>
                      <div class="input-group">
                          <div class="custom-file">
                          <input type="file" class="custom-file-input" name="mobile_image" id="file_mobile">
                          <label class="custom-file-label" for="file">Choose file</label>
                          </div>
                          <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                          </div>
                      </div>
                  </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>




  @endsection

  @section('scripts')

  <script>
    $(document).on('change','select[name="type"]',function(){
       let $this = $(this);
       if($this.val() == 2){
        $('#categoryDiv').removeClass('d-none');
       }else{
        $('#categoryDiv').addClass('d-none');

       }
    });
  </script>
  @endsection
  <!-- /.content-wrapper -->
