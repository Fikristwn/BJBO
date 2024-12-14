<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">M FIkri Setiawan</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">RPL</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Menu</li>
      <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="fas fa-home"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="{{ Request::is('users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users') }}"><i class="fas fa-box"></i>
        <span>Pengguna</span></a></li>

        <li class="{{ Request::is('postingans') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.postings') }}"><i class="fas fa-box"></i>
          <span>Postingan</span></a></li>

          <li class="#">
            <a class="nav-link" href="#"><i class="fas fa-box"></i>
            <span>Ulasan</span></a></li>

            <li class="#">
              <a class="nav-link" href="#"><i class="fas fa-box"></i>
              <span>Transaksi</span></a></li>

              <li class="#">
                <a class="nav-link" href="#"><i class="fas fa-box"></i>
                <span>Laporan</span></a></li>
            
    </ul>
  </aside>
</div>