 
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
                    <h3> Mangage slider 
                    <a href="{{url('sliders/create')}}" class="btn btn-success float-right btn-sm">
                        <i class="fa fa-plus-circle">Add slider</i>
                    </a>
                  
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr>
                                <th>SL. </th>
                                <th>slider </th>
                                <th>Short Title  </th>
                                <th>Long Title </th>
                                <th> Action </th>
                            </tr>
                         </thead>
                         <tbody>
                             @foreach ($allData as $key =>$slider)
                                 <tr>
                                     <td class="text-center" >{{$key+1}}</td>
                                     <td class="text-center" >
                                         <img name="image" src="{{(!empty($slider->image))?url('/upload/slider_images/'.$slider->image):url('/upload/nofound.png')}}" width="120px" height="130px" alt="">
                                     </td>
                                     <td> {{$slider->short_title}}</td>
                                     <td> {{$slider->long_title}}</td>
                                     <td>
                                       <form method="POST" action="{{ route('sliders.destroy', $slider->id) }}">
                                         <a title="Edit" class="btn btn-sm btn-primary"href="{{ route('sliders.edit', ['slider' => $slider->id]) }}">
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