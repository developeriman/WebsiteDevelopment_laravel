 
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
                    <h3> Mangage Contact 
                    <a href="{{url('contacts/create')}}" class="btn btn-success float-right btn-sm">
                        <i class="fa fa-plus-circle">Add Contact</i>
                    </a>
                  
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr>
                                <th>SL. </th>
                                <th>Address  </th>
                                <th>Mobile  </th>
                                <th>Email  </th>
                                <th>Facebook  </th>
                                <th>Twitter  </th>
                                <th>Youtube </th>
                                <th>Google Plus </th>
                                <th> Action </th>
                            </tr>
                         </thead>
                         <tbody>
                             @foreach ($allData as $key =>$contact)
                                 <tr>
                                     <td class="text-center" >{{$key+1}}</td>
                                     <td> {{$contact->address}}</td>
                                     <td> {{$contact->mobile}}</td>
                                     <td> {{$contact->email}}</td>
                                     <td> {{$contact->facebook}}</td>
                                     <td> {{$contact->twitter}}</td>
                                     <td> {{$contact->youtube}}</td>
                                     <td> {{$contact->google_plus}}</td>
                                     <td>
                                       <form method="POST" action="{{ route('contacts.destroy', $contact->id) }}">
                                         <a title="Edit" class="btn btn-sm btn-primary"href="{{ route('contacts.edit', ['contact' => $contact->id]) }}">
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