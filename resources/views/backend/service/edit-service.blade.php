 
 @extends('backend.layouts.master')
 @section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Slider slider </h1>
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
                    <h3> Add Service </h3>
                    <a href="{{route('services.index')}}" class="btn btn-success float-right btn-sm">
                        <i class="fa fa-list"></i>  Services List
                    </a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                   <form action="{{route('services.update',$editData->id)}}" enctype="multipart/form-data" method="POST" id="myForm">
                       @csrf
                        @method('PUT')
                       <div class="form-group col-md-4"> 
                                <label for="short_title">Short Title</label>
                               <input type="text" value="{{$editData->short_title}}" name="short_title" class="form-control">
                        </div>

                          <div class="form-group col-md-4"> 
                                <label for="long_title">Long Title</label>
                               <input type="text" value="{{$editData->long_title}}" name="long_title" class="form-control">
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