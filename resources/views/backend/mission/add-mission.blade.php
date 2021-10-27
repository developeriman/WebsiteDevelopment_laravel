 
 @extends('backend.layouts.master')
 @section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">slider slider </h1>
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
                    <h3> Add slider </h3>
                    <a href="{{route('missions.index')}}" class="btn btn-success float-right btn-sm">
                        <i class="fa fa-list"></i>  Mission List
                    </a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                   <form action="{{route('missions.store')}}" enctype="multipart/form-data" method="POST" id="myForm">
                       @csrf

                      
                    <div class="form-row">
                          <div class="form-group col-md-12"> 
                                <label for="title">Long Title</label>
                                <textarea name="title" title="message here" rows="3" class="form-control">Enter text here...</textarea>
                          </div>

                            <div class="form-group col-md-4"> 
                                <label for="image">Image</label>
                               <input type="file"   name="image" class="form-control" id="image">
                           </div><br><br>
                            <div class="form-group col-md-4"> 
                                <img id="showImage" src="{{(!empty($editData->image))?url('/upload/user_images/'.$editData->image):url('/upload/nofound.png')}}" style="width:150px;height:160px; border:1px solid #000" alt="">
                           </div>

                           <div class="form-group col-md-6 "> 
                               <input type="submit" value="Submit" class="btn btn-primary">
                           </div>
                       </div>
                       </div>
                   </form>
                  </div>
                  <!-- /.card-body -->
                </div>

              </section>
              <!-- /.Left col -->
              <!-- right col (We are only adding the ID to make the widgets sortable)-->
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