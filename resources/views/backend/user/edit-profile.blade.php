 
 @extends('backend.layouts.master')
 @section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Edit Profile </h1>
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
                    <h3> User List </h3>
                    <a href="{{url('profiles')}}" class="btn btn-success float-right btn-sm">
                        <i class="fa fa-list"></i> Your Profile 
                    </a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                   <form action="{{ route('users.update',$editData->id) }}" enctype="multipart/form-data" method="POST" id="myForm">
                    @method('PUT')
                       @csrf
                        <div class="form-row">
                           <div class="form-group col-md-4">
                                <label for="name">Name</label>
                                <input type="text" value="{{$editData->name}}" name="name" id="name" class="form-control">
                                <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                           </div>
                            <div class="form-group col-md-4">
                                <label for="mobile">Mobile No:</label>
                                <input type="number"value="{{$editData->mobile}}" name="mobile" id="mobile" class="form-control">
                             <font style="color:red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                           </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email:</label>
                                <input type="email"value="{{$editData->email}}" name="email" id="email" class="form-control">
                             <font style="color:red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                           </div>

                              <div class="form-group col-md-4">
                                <label for="address">Address:</label>
                                <input type="text"value="{{$editData->address}}" name="address" id="address" class="form-control">
                             <font style="color:red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                           </div>

                      
                           <div class="form-group col-md-4">
                               <label for="gender">Gender</label>
                               <select name="gender"id="gender" class="form-control">
                                   <option value="">Select Gender</option>
                                   <option value="Gender" {{($editData->gender=='Male')?"selected":""}} >Male</option>
                                   <option value="Femail" {{($editData->gender=='Female')?"selected":""}} >Female</option>

                               </select>
                           </div>

                            <div class="form-group col-md-4"> 
                                <label for="image">Image</label>
                               <input type="file" name="image" class="form-control" id="image">
                           </div>
                            <div class="form-group col-md-4"> 
                                <img id="showImage" src="{{(!empty($editData->image))?url('/upload/user_images/'.$editData->image):url('/upload/nofound.png')}}" style="width:150px;height:160px; border:1px solid #000" alt="">
                           </div>

                           <div class="form-group col-md-6 " style="padding-top:30px;"> 
                               <input type="submit" value="Update" class="btn btn-primary">
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