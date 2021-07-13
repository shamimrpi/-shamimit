

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ URL::to('/') }}/users_photo/{{ Auth::user()->photo}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
           
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Profile</span>
            <span class="label label-primary pull-right">4</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('profile')}}"><i class="fa fa-circle-o"></i> Your Profile</a></li>
            <li><a href="{{route('update.password')}}"><i class="fa fa-circle-o"></i>Change Password</a></li>
            <li><a href="{{route('edit.pic')}}"><i class="fa fa-circle-o"></i>Change Photo</a></li>
            <li><a href="{{route('users')}}"><i class="fa fa-circle-o"></i> All Users</a></li>
            <li><a href="{{route('user.create')}}"><i class="fa fa-circle-o"></i> New User</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-picture-o"></i>
            <span>Post</span>
            <span class="label label-primary pull-right">1</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('posts')}}"><i class="fa fa-circle-o"></i>Create Post</a></li>
         
          </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>SMS</span>
            <span class="label label-primary pull-right">3</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('sms')}}"><i class="fa fa-envelope"></i>SMS</a></li>
            <li><a href="{{route('create.sms')}}"><i class="fa fa-circle-o"></i>Create SMS</a></li>
            <li><a href="{{route('sent.sms')}}"><i class="fa fa-circle-o"></i>Sent SMS</a></li>
            
          </ul>
        </li>
     
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>