<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/home">
                    <i class="fas fa-home"></i>
                    <span>Kembali Ke Toko</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kelola Toko</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.tags.index') }}">Kelola Tag</a>
                        <a class="collapse-item" href="{{ route('admin.categories.index') }}">Kelola Kategori</a>
                        <a class="collapse-item" href="{{ route('admin.products.index') }}">Kelola Produk</a>
                        <a class="collapse-item" href="{{ route('admin.products.index') }}">Kelola Layanan</a>
                    </div>
                </div>


           {{-- ubah supaya gapake dropdown --}}
            </li>
               <li class="nav-item">
                <a class="nav-link collapsed" href="/order" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kelola Pesanan</span>
                </a>
            </li>
            </li>
               <li class="nav-item">
                <a class="nav-link collapsed" href="#"  data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kelola Reservasi</span>
                </a>
            </li>
            </li>
               <li class="nav-item">
                <a class="nav-link collapsed" href="#"  data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kelola Data Pelanggan</span>
                </a>
            </li>
            </li>
               <li class="nav-item">
                <a class="nav-link collapsed" href="#"  data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Kelola Laporan</span>
                </a>
            </li>
        </ul>
