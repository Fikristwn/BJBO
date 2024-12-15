
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#" class="logo d-flex justify-content-center align-items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" height="80">
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">BJBO</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Menu</li>
      <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="fas fa-home"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="{{ Route::is('users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users') }}">
          <i class="fas fa-users"></i> <!-- Ikon pengguna -->
          <span>Pengguna</span>
        </a>
      </li>
      

        <li class="{{ Request::is('postingans') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.postings') }}">
            <i class="fas fa-pencil-alt"></i>
            <span>Postingan</span>
          </a> </li>
        

          <li class="{{ Request::is('ulasans') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.ulasans') }}">
              <i class="fas fa-comment-dots"></i> <!-- Ikon komentar -->
              <span>Ulasan</span>
            </a>
          </li>
          
          <li class="#">
            <a class="nav-link" href="#">
              <i class="fas fa-credit-card"></i> <!-- Ikon kartu kredit -->
              <span>Transaksi</span>
            </a>
          </li>
          
          <li class="{{ Request::is('laporans') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.laporans') }}">
              <i class="fas fa-chart-line"></i> <!-- Ikon grafik -->
              <span>Laporan</span>
            </a>
          </li>

          <li class="#">
            <a class="nav-link" href="#">
              <i class="fas fa-clipboard-list"></i> <!-- Ikon daftar laporan -->
              <span>Feedback</span>
            </a>
          </li>
          
          
    </ul>
  </aside>
</div>