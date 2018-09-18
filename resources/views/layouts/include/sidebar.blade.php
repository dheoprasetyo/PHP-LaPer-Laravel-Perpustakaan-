<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('images/user/'.Auth::user()->gambar)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{Auth::user()->name}}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="nav-item {{ setActive(['/', 'home']) }}">
              <a class="nav-link" href="{{url('/')}}">
                <i class="fa fa-dashboard"></i> 
                <span>Dashboard</span>
              </a>
            </li>

            <li class="treeview {{ setActive(['anggota*', 'buku*', 'user*']) }}">
              <a href="#"><i class="fa fa-pie-chart"></i><span>Master Data</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu {{ setShow(['anggota*', 'buku*', 'user*']) }}">
                <li class="{{ setActive(['user*']) }}"><a class="nav-link " href="{{route('user.index')}}"><i class="fa fa-child"></i> Data User</a>
                </li>
                <li class="{{ setActive(['anggota*']) }}"><a href="{{route('anggota.index')}}"><i class="fa fa-user"></i> Data Anggota</a>
                </li>
                <li class="{{ setActive(['buku*']) }}"><a class="nav-link " href="{{route('buku.index')}}"><i class=" fa fa-book"></i> Data Buku</a>
                </li>
              </ul>
            </li>

            <li class="nav-item {{ setActive(['transaksi*']) }}">
              <a class="nav-link" href="{{route('transaksi.index')}}">
                <i class="fa fa-bar-chart"></i> 
                <span>Transaksi</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>