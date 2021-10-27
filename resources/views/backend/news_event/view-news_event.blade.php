 
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
                    <h3> Mangage News And events   
                    <a href="{{url('news_events/create')}}" class="btn btn-success float-right btn-sm">
                        <i class="fa fa-plus-circle">Add news_events</i>
                    </a>
                  
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                            <tr>
                                <th>SL. </th>
                                <th>date </th>
                                <th>slider </th>
                                <th>Short Title  </th>
                                <th>Long Title </th>
                                <th> Action </th>
                            </tr>
                         </thead>
                         <tbody>
                             @foreach ($allData as $key =>$news_events)
                                 <tr>
                                     <td class="text-center" >{{$key+1}}</td>
                                     <td> {{$news_events->date}}</td>
                                     <td class="text-center" >
                                         <img name="image" src="{{(!empty($news_events->image))?url('/upload/news_events_images/'.$news_events->image):url('/upload/nofound.png')}}" width="120px" height="130px" alt="">
                                     </td>

                                     <td> {{$news_events->title}}</td>
                                     <td> {{$news_events->long_title}}</td>
                                     <td>
                                       <form method="POST" action="{{ route('news_events.destroy', $news_events->id) }}">
                                         <a title="Edit" class="btn btn-sm btn-primary"href="{{ route('news_events.edit',$news_events->id) }}">
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
           
            </div>
            <!-- /.row (main row) -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
  @endsection