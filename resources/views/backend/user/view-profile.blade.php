 
 @extends('backend.layouts.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Mange Profile</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Profile</li>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
       
        <section class="content">
          <div class="container-fluid">
         
            <div class="row">
              <section class="col-md-4 offset-md-4">
                
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{(!empty($user->image))?url('/upload/user_images/'.$user->image):url('/upload/nofound.png')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">{{$user->address}}</p>

                    <table width="100%" class="table table-bordered">
                        <tbody>
                          <tr>
                            <th>Mobile No:</th>
                            <td>{{$user->mobile}}</td>
                          </tr>
                              <tr>
                            <th>Email:</th>
                            <td>{{$user->email}}</td>
                          </tr>
                              <tr>
                            <th>Gender:</th>
                            <td>{{$user->gender}}</td>
                          </tr>
                        </tbody>
                    </table>

                <a href="{{ route('profiles.edit',$user->id) }}" class="btn btn-primary btn-block"><b>Profile Edit</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
              </section>
            
            </div>
          </div>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
  @endsection