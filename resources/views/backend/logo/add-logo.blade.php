 
 @extends('backend.layouts.master')
 @section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Edit Logo </h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">User</li>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
        
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
              <!-- Left col -->
              <section class="col-md-12">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                 
                  <div class="card-header">
                    <h3> Add Logo </h3>
                    <a href="{{route('logos.index')}}" class="btn btn-success float-right btn-sm">
                        <i class="fa fa-list"></i>  Logo List
                    </a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                   <form action="{{route('logos.store')}}" enctype="multipart/form-data" method="POST" id="myForm">
                       @csrf
                            <div class="form-group col-md-4"> 
                                <label for="image">Image</label>
                               <input type="file" name="image" class="form-control" id="image">
                           </div>
                            <div class="form-group col-md-4"> 
                                <img id="showImage" src="{{(!empty($editData->image))?url('/upload/user_images/'.$editData->image):url('/upload/nofound.png')}}" style="width:150px;height:160px; border:1px solid #000" alt="">
                           </div>

                           <div class="form-group col-md-6 " style="padding-top:30px;"> 
                               <input type="submit" value="Submit" class="btn btn-primary">
                           </div>
                       </div>
                   </form>
                  </div>
                  <!-- /.card-body -->
                </div>

              </section>
              <!-- /.Left col -->
              <!-- right col (We are only adding the ID to make the widgets sortable)-->
              <section class="col-lg-5 connectedSortable"></section>
              <!-- right col -->
            </div>
            <!-- /.row (main row) -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      
   
        

  @endsection