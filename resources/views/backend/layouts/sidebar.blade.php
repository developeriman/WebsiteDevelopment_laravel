

@php
    $prefix =Request::route()->getPrefix(); 
    $route =Route::current()->getName(); 
    
@endphp
  <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
            @if(Auth::user()->usertype=="Admin") @endif
            <li class="nav-item has-treeview">
 {{-- {{($preifx ==='/user')?'menu-open':'' }} --}}
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                  Manage User
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                </li>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link " 
                    {{($route ==='/users.index')?'active':''}}>
                      <i class="far fa-circle nav-icon"></i>
                        <p> View User</p> 
                    </a>
                  </li>
               
                </ul>
                
              </li>
               {{-- @endif --}}

               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                        Manage User Profile
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('profiles.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                        <p>  Your Profile</p> 
                    </a>
                  </li>

                    <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                        Manage User Profile
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('profiles.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                        <p>  Your Profile</p> 
                    </a>
                  </li>

                   <li class="nav-item">
                    <a href="{{route('profiles.password.view')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                        <p>  Change Password</p> 
                    </a>
                  </li>
                </ul>
              </li>

                   <li class="nav-item">
                    <a href="{{route('profiles.password.view')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                        <p>  Change Password</p> 
                    </a>
                  </li>
                </ul>
              </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                        Manage Logo
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('logos.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                        <p>  View Logo</p> 
                    </a>
                  </li>     
                </ul>
                
              </li>
              
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                        Manage Slider
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('sliders.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                        <p>  View Slider</p> 
                    </a>
                  </li>     
                </ul>
                
              </li>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('logos.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                        <p>  View Logo</p> 
                    </a>
                  </li>     
                </ul>
                
              </li>
              
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                        Manage Mission
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('missions.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                        <p>  View Mission</p> 
                    </a>
                  </li>
                   <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                        Manage Vision
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('visions.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                        <p>  View Vision</p> 
                    </a>
                  </li>   
                </ul>
                
              </li>


              {{-- Working event Management  --}}

                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                        Manage News Events
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('news_events.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                        <p>  View New Events</p> 
                    </a>
                  </li>   
                </ul>
                
              </li>


                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                        Manage Services
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('services.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                        <p>  View Services</p> 
                    </a>
                  </li>   
                </ul>
                
              </li>


               <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                        Manage Contact
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('contacts.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                        <p>  View Contact</p> 
                    </a>
                  </li>   
                </ul>
                
              </li>


              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                        Manage About
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('abouts.index')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                        <p>  View About</p> 
                    </a>
                  </li>   
                </ul>
                
              </li>

            </ul>
          </nav>
          <!-- /.sidebar-menu -->