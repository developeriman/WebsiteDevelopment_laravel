 
 @extends('backend.layouts.master')
 @section('content')
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Mange User</h1>
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
                    <a href="{{url('users/create ')}}" class="btn btn-success float-right btn-sm">
                        <i class="fa fa-plus-circle">Add User</i>
                    </a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr>
                                <th>SL. </th>
                                <th>Role </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th> Action </th>
                            </tr>
                         </thead>
                         <tbody>
                             @foreach ($allData as $key =>$user)
                                 <tr>
                                     <td class="text-center" >{{$key+1}}</td>
                                     <td class="text-center" >{{$user->usertype}}</td>
                                     <td class="text-center" >{{$user->name}}</td>
                                     <td class="text-center" >{{$user->email}}</td>
                                     <td>
                                       <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                         <a title="Edit" class="btn btn-sm btn-primary"href="{{ route('users.edit', ['user' => $user->id]) }}">
                                             <i class="fa fa-edit"></i>
                                         </a>
                                         </a>
                                         	@csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"> 
                                              <i class="fa fa-trash"></i>  
                                            </button>	

                                         </form>
                                     </td>
                                     
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
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