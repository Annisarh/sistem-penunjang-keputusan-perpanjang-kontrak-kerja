<!-- Sidebar Start -->
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between position-relative">
      <a href="./index.html" class="text-nowrap logo-img">
        <img src="{{asset('Assets/images/Logo-Wuling-MMG-1024x267.webp')}}" width="250" alt="" />
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer position-absolute end-0" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{route('dashboard')}}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        @canany(['user', 'admin'])
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">DATA PENILAIAN</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{route('criteria')}}" aria-expanded="false">
            <span>
              <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">DATA KRITERIA</span>
          </a>
        </li>
        {{-- <li class="sidebar-item">
          <a class="sidebar-link" href="{{route('subcriteria')}}" aria-expanded="false">
            <span>
              <i class="ti ti-article"></i>
            </span>
            <span class="hide-menu">DATA SUBKRITERIA</span>
          </a>
        </li> --}}
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{route('alternative')}}" aria-expanded="false">
            <span>
              <i class="ti ti-notebook"></i>
            </span>
            <span class="hide-menu">DATA ALTERNATIF</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{route('penilaian')}}" aria-expanded="false">
            <span>
              <i class="ti ti-cards"></i>
            </span>
            <span class="hide-menu">DATA PENILAIAN</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{route('topsis')}}" aria-expanded="false">
            <span>
              <i class="ti ti-keyframe-align-center"></i>
            </span>
            <span class="hide-menu">DATA PERHITUNGAN</span>
          </a>
        </li>
        @endcanany
        
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">HASIL PERHITUNGAN</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{route('hasil')}}" aria-expanded="false">
            <span>
              <i class="ti ti-keyframe-align-center"></i>
            </span>
            <span class="hide-menu">DATA HASIL AKHIR</span>
          </a>
        </li>
        @canany(['admin', 'kepala cabang'])
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{route('laporan')}}" aria-expanded="false">
            <span>
              <i class="ti ti-keyframe-align-center"></i>
            </span>
            <span class="hide-menu">LAPORAN</span>
          </a>
        </li>
        @endcanany
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Data Users</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{route('profile')}}" aria-expanded="false">
            <span>
              <i class="ti ti-keyframe-align-center"></i>
            </span>
            <span class="hide-menu">PROFILE USER</span>
          </a>
        </li>
        @can('admin')
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{route('users')}}" aria-expanded="false">
            <span>
              <i class="ti ti-keyframe-align-center"></i>
            </span>
            <span class="hide-menu">DATA USERS</span>
          </a>
        </li>
        @endcan
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->