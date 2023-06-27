@extends('layouts.admin')
@section('content')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              {{-- <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span> --}}

              <div class="info-box-content">
                <span class="info-box-text">Category</span>
                <span class="info-box-number">
                  {{$category}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              {{-- <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span> --}}

              <div class="info-box-content">
                <span class="info-box-text">Sub Category</span>
                <span class="info-box-number">{{$sub}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              {{-- <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span> --}}

              <div class="info-box-content">
                <span class="info-box-text">Product</span>
                <span class="info-box-number">{{$product}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              {{-- <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span> --}}

              <div class="info-box-content">
                <span class="info-box-text">Product Media</span>
                <span class="info-box-number">{{$media}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection
