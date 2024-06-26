<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        {{-- <div class="user">
            <div class="avatar-sm float-left mr-2">
                <img src="../../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        Hizrian
                        <span class="user-level">Administrator</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}
        <ul class="nav nav-primary">
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                    {{-- <span class="badge badge-success">4</span> --}}
                </a>
            </li>
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Main Menu</h4>
            </li>
            <li class="nav-item {{ Request::is('gelombang') ? 'active' : '' }}">
                <a href="/gelombang">
                    <i class="fas fa-layer-group"></i>
                    <p>Gelombang</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('jalur-seleksi') ? 'active' : '' }}">
                <a href="/jalur-seleksi">
                    <i class="fas fa-layer-group"></i>
                    <p>Jalur Seleksi</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('pilih-jurusan') ? 'active' : '' }}">
                <a href="/pilih-jurusan">
                    <i class="fas fa-layer-group"></i>
                    <p>Jurusan</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('program-tambahan') ? 'active' : '' }}">
                <a href="/program-tambahan">
                    <i class="fas fa-layer-group"></i>
                    <p>Program Tambahan</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('biodata') ? 'active' : '' }}">
                <a href="/biodata">
                    <i class="fas fa-layer-group"></i>
                    <p>Biodata</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('jadwal-seleksi') ? 'active' : '' }}">
                <a href="/jadwal-seleksi">
                    <i class="fas fa-layer-group"></i>
                    <p>Jadwal Seleksi</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('pengumuman-kelulusan') ? 'active' : '' }}">
                <a href="/pengumuman-kelulusan">
                    <i class="fas fa-layer-group"></i>
                    <p>Pengumuman</p>
                </a>
            </li>
            @if(Auth::guard('admin')->check())
            <li class="nav-item {{ Request::is('admin/pendaftar') ? 'active' : '' }}">
                <a href="/admin/pendaftar">
                    <i class="fas fa-layer-group"></i>
                    <p>Data Pendaftar</p>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a data-toggle="collapse" href="#custompages">
                    <i class="fas fa-paint-roller"></i>
                    <p>Custom Pages</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse" id="custompages">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="../login.html">
                                <span class="sub-item">Login & Register 1</span>
                            </a>
                        </li>
                        <li>
                            <a href="../login2.html">
                                <span class="sub-item">Login & Register 2</span>
                            </a>
                        </li>
                        <li>
                            <a href="../login3.html">
                                <span class="sub-item">Login & Register 3</span>
                            </a>
                        </li>
                        <li>
                            <a href="../userprofile.html">
                                <span class="sub-item">User Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="../404.html">
                                <span class="sub-item">404</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>