  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Obat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

          <li>
            <a href="{{ url('obat-keluar') }}">
              <i class="bi bi-circle"></i><span>Obat Keluar</span>
            </a>
          </li>

          <li>
            <a href="{{ url('obat-masuk') }}">
              <i class="bi bi-circle"></i><span>Obat Masuk</span>
            </a>
          </li>

          <li>
            <a href="{{ url('permintaan') }}">
              <i class="bi bi-circle"></i><span>Permintaan</span>
            </a>
          </li>
 
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Kelola User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('user') }}">
              <i class="bi bi-circle"></i><span>User</span>
            </a>
          </li>

        </ul>
      </li><!-- End Icons Nav -->


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('profile') }}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->