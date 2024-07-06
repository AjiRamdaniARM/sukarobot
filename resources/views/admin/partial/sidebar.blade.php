  <!-- ======= Sidebar ======= -->

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard') ? '' : ' collapsed' }}" href="{{url('/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard/profile/*') ? '' : ' collapsed' }}" href="{{url('/dashboard/profile', Auth::user()->id)}}">
          <i class="bi bi-person"></i>
          <span>Profil</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @if (Auth::user()->role === 'user')
      <li class="nav-heading">Pelatihan</li>
      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard/user/pelatihan') ? '' : ' collapsed' }}" href="{{url('/dashboard/user/pelatihan')}}">
          <i class="bi bi-display"></i>
          <span>Pelatihan saya</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard/user/sertifikat') ? '' : ' collapsed' }}" href="{{url('/dashboard/user/sertifikat')}}">
          <i class="bi bi-card-list"></i>
          <span>Sertifikat saya</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @endif


      @if (Auth::user()->role === 'admin')

      <li class="nav-heading">User Data</li>
      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard/user') ? '' : ' collapsed' }}" href="{{url('/dashboard/user')}}">
          <i class="bi bi-people"></i>
          <span>Data User</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @auth
      @if(Auth::user()->email == 'superadmin@admin.com')
          <li class="nav-item">
              <a class="nav-link{{ Request::is('dashboard/admin') ? '' : ' collapsed' }}" href="{{ url('/dashboard/admin') }}">
                  <i class="bi bi-people"></i>
                  <span>Data Admin</span>
              </a>
          </li>
      @endif
  @endauth<!-- End Dashboard Nav -->

      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard/kategori') ? '' : ' collapsed' }}" href="{{url('/dashboard/kategori')}}">
          <i class="bi bi-menu-button-wide"></i>
          <span>Kompetensi</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard/instruktur') ? '' : ' collapsed' }}" href="{{url('/dashboard/instruktur')}}">
          <i class="bi bi-person"></i>
          <span>Instuktur</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard/pelatihan') ? '' : ' collapsed' }}" href="{{url('/dashboard/pelatihan')}}">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>Pelatihan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard/galeri') ? '' : ' collapsed' }}" href="{{url('/dashboard/galeri')}}">
          <i class="bi bi-journal-text"></i>
          <span>Galeri</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-heading">Administratif</li>

      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard/service') ? '' : ' collapsed' }}" href="{{url('/dashboard/service')}}">
            <i class="bi bi-person-rolodex"></i>
          <span>Service Contact</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard/bukti') ? '' : ' collapsed' }}" href="{{url('/dashboard/bukti')}}">
          <i class="bi bi-card-list"></i>
          <span>Bukti Pelatihan</span>
        </a>
      </li><!-- End Register Page Nav -->
      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard/sertifikat') ? '' : ' collapsed' }}" href="{{url('/dashboard/sertifikat')}}">
          <i class="bi bi-card-list"></i>
          <span>Sertifikat</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard/laporan-bulanan') ? '' : ' collapsed' }}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('/dashboard/laporan-bulan')}}">
              <i class="bi bi-circle"></i><span>Bulan</span>
            </a>
          </li>
          <li>
            <a href="{{url('/dashboard/laporan-tahun')}}">
              <i class="bi bi-circle"></i><span>Tahun</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->
      @endif
      <li class="nav-heading">Transaksi</li>
      <li class="nav-item">
        <a class="nav-link{{ Request::is('dashboard/user/transaksi') ? '' : ' collapsed' }}" href="{{url('/dashboard/user/transaksi')}}">
          <i class="bi bi-wallet2"></i>
          <span>Transaksi</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>

  </aside><!-- End Sidebar-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Menonaktifkan collapsed saat profil di klik
        $('li.nav-item a.nav-link[href*="/dashboard/profile"]').click(function() {
            $(this).attr('data-bs-toggle', 'null');
        });
    });
</script>
