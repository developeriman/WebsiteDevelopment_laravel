 
 @extends('backend.layouts.master')
 @section('content')
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Mange User</h1>
              </div>

              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">User</li>
                </ol>
              </div>

            </div>

        </div>

    </div>

        <section class="content">
          <div class="container-fluid">
           
            <div class="row">
              <section class="col-md-12">
                <div class="card">
                 
                  <div class="card-header">
                    <h3> Mangage Vision 
                      @if($countVision <1)
                    <a href="{{url('visions/create')}}" class="btn btn-success float-right btn-sm">
                        <i class="fa fa-plus-circle">Add Vision</i>
                    </a>
                    @endif
                  
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
                             @foreach ($allData as $key =>$vision)
                                 <tr>
                                     <td class="text-center" >{{$key+1}}</td>
                                     <td class="text-center" >
                                         <img name="image" src="{{(!empty($vision->image))?url('/upload/vision_images/'.$vision->image):url('/upload/nofound.png')}}" width="120px" height="130px" alt="">
                                     </td>
                                     <td> {{$vision->title}}</td>
                                     <td>
                                       <form method="POST"
                                        action="{{ route('visions.destroy', $vision->id) }}">
                                        	@csrf
                                            @method('DELETE')
                                         <a title="Edit" class="btn btn-sm btn-primary"
                                         href="{{ route('visions.edit', $vision->id) }}">
                                             <i class="fa fa-edit"></i>
                                         </a>
                                         
                                         
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
              <section class="col-lg-5 connectedSortable"></section>
            </div>
          </div>
        </section>
      </div>
  @endsection