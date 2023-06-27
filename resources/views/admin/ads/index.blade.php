@extends('layouts.admin')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Banner List</h3>
                <a  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary float-right" title ="Add Slider">Add Ads Banner </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >#</th>
                     
                      <th>Image</th>

                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($slider as $key=>$slider)
                    <tr>
                      <td>{{ $key + 1}}</td>
                      
                      <td>
                     

                          <img style="width: 5rem;" src="{{ asset('uploads/ads/'.$slider->banner) }}" class="rounded img-fluid  d-block" alt="">

                        
                      </td>


                      <td>
                        <a href="{{ route('removeAds',$slider->id) }}" class="btn btn-danger" title="Delete">Delete</a>

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
      <form action="{{ route('addAdsImage') }}" enctype="multipart/form-data" method="post">
        @csrf
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Ads Banner</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                     </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="form-group">
                        <label for="exampleInputPassword1">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
                    </div> -->

                    

                    <div class="form-group">
                        <label for="file">Banner Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="file">
                            <label class="custom-file-label" for="file">Choose file</label>
                            </div>
                            <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                            </div>
                        </div><br>
                        <div class="input-group">
                            <input type="text" class="form-control" name="linkadd">
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
