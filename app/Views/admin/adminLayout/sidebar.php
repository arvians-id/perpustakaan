<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/img-pengguna/<?= $pengguna['photo'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $pengguna['nama_lengkap'] ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item <?= service('uri')->getSegment(2) == '' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= service('uri')->getSegment(2) == '' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin" class="nav-link <?= service('uri')->getSegment(2) == '' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link" target="_blank">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Halaman Utama</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Management Buku</li>
                <li class="nav-item <?= (service('uri')->getSegment(2) == 'buat_buku' ? 'menu-open' : ((service('uri')->getSegment(2) == 'donasi' ? 'menu-open' : ((service('uri')->getSegment(2) == 'buku' ? 'menu-open' : ((service('uri')->getSegment(2) == 'buku_macatongsir' ? 'menu-open' : ''))))))) ?>">
                    <a href="#" class="nav-link <?= (service('uri')->getSegment(2) == 'buat_buku' ? 'active' : ((service('uri')->getSegment(2) == 'donasi' ? 'active' : ((service('uri')->getSegment(2) == 'buku' ? 'active' : ((service('uri')->getSegment(2) == 'buku_macatongsir' ? 'active' : ''))))))) ?>">
                        <i class="nav-icon fa fa-swatchbook"></i>
                        <p>
                            Buku
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/buat_buku" class="nav-link <?= service('uri')->getSegment(2) == 'buat_buku' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buat Buku</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/buku_macatongsir" class="nav-link <?= service('uri')->getSegment(2) == 'buku_macatongsir' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Buku Macatongsir</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/donasi" class="nav-link <?= service('uri')->getSegment(2) == 'donasi' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Donasi</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/buku" class="nav-link <?= service('uri')->getSegment(2) == 'buku' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Buku UMMI</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= (service('uri')->getSegment(2) == 'dalam_proses_peminjaman' ? 'menu-open' : ((service('uri')->getSegment(2) == 'riwayat_peminjaman' ? 'menu-open' : ''))) ?>">
                    <a href="#" class="nav-link <?= (service('uri')->getSegment(2) == 'dalam_proses_peminjaman' ? 'active' : ((service('uri')->getSegment(2) == 'riwayat_peminjaman' ? 'active' : ''))) ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Peminjaman Buku
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/dalam_proses_peminjaman" class="nav-link <?= service('uri')->getSegment(2) == 'dalam_proses_peminjaman' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lihat Peminjaman</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/riwayat_peminjaman" class="nav-link <?= service('uri')->getSegment(2) == 'riwayat_peminjaman' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Riwayat Peminjaman</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Management Pengguna</li>
                <li class="nav-item <?= (service('uri')->getSegment(2) == 'daftar_admin' ? 'menu-open' : ((service('uri')->getSegment(2) == 'profil' ? 'menu-open' : ''))) ?>">
                    <a href="#" class="nav-link <?= (service('uri')->getSegment(2) == 'daftar_admin' ? 'active' : ((service('uri')->getSegment(2) == 'profil' ? 'active' : ''))) ?>">
                        <i class="nav-icon fa fa-user-lock"></i>
                        <p>
                            Admin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/daftar_admin" class="nav-link <?= service('uri')->getSegment(2) == 'daftar_admin' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Admin</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/profil" class="nav-link <?= service('uri')->getSegment(2) == 'profil' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profil Anda</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= (service('uri')->getSegment(2) == 'daftar_member' ? 'menu-open' : ((service('uri')->getSegment(2) == 'daftar_member_terverifikasi' ? 'menu-open' : ((service('uri')->getSegment(2) == 'pengajuan_member' ? 'menu-open' : ''))))) ?>">
                    <a href="#" class="nav-link <?= (service('uri')->getSegment(2) == 'daftar_member' ? 'active' : ((service('uri')->getSegment(2) == 'daftar_member_terverifikasi' ? 'active' : ((service('uri')->getSegment(2) == 'pengajuan_member' ? 'active' : ''))))) ?>">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Member
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/daftar_member" class="nav-link <?= service('uri')->getSegment(2) == 'daftar_member' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Semua Member</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/pengajuan_member" class="nav-link <?= service('uri')->getSegment(2) == 'pengajuan_member' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan Member Verif</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Management Pelayanan</li>
                <li class="nav-item <?= (service('uri')->getSegment(2) == 'buat_artikel' ? 'menu-open' : ((service('uri')->getSegment(2) == 'artikel' ? 'menu-open' : ''))) ?>">
                    <a href="#" class="nav-link <?= (service('uri')->getSegment(2) == 'buat_artikel' ? 'active' : ((service('uri')->getSegment(2) == 'artikel' ? 'active' : ''))) ?>">
                        <i class="nav-icon fa fa-newspaper"></i>
                        <p>
                            Artikel
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/buat_artikel" class="nav-link <?= service('uri')->getSegment(2) == 'buat_artikel' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buat Artikel</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/artikel" class="nav-link <?= service('uri')->getSegment(2) == 'artikel' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Artikel</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= (service('uri')->getSegment(2) == 'buat_kegiatan' ? 'menu-open' : ((service('uri')->getSegment(2) == 'kegiatan' ? 'menu-open' : ''))) ?>">
                    <a href="#" class="nav-link <?= (service('uri')->getSegment(2) == 'buat_kegiatan' ? 'active' : ((service('uri')->getSegment(2) == 'kegiatan' ? 'active' : ''))) ?>">
                        <i class="nav-icon fas fa-campground"></i>
                        <p>
                            Acara
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/buat_kegiatan" class="nav-link <?= service('uri')->getSegment(2) == 'buat_kegiatan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buat Kegiatan</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/kegiatan" class="nav-link <?= service('uri')->getSegment(2) == 'kegiatan' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Daftar Kegiatan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Pengaturan Website</li>
                <li class="nav-item <?= service('uri')->getSegment(2) == 'konfigurasi_website' ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= service('uri')->getSegment(2) == 'konfigurasi_website' ? 'active' : '' ?>">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Setting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/konfigurasi_website" class="nav-link <?= service('uri')->getSegment(2) == 'konfigurasi_website' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Konfigurasi Website</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/masuk/logout" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>