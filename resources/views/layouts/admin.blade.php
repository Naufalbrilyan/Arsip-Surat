<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- Your custom CSS file -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="wrapper" style="display: flex; min-height: 170;">
        <nav id="sidebar" class="bg-dark" style="position: sticky; top: 0; bottom: 0; overflow-y: auto;">

            <div class="sidebar-header">
                <h3>Arsip Surat</h3>
                <p class="mb-0">Menu</p>
            </div>
    
            <ul class="list-unstyled components">
                @if (Auth::guard('admin')->user()->level == 'admin')
                <li class="{{ Request::is('admin/surat') ? 'active' : '' }}">
                    <a href="{{ route('surat.index') }}">
                        <i class="fas fa-user-cog mr-2"></i>Arsip</a>
                </li>
                <li class="{{ Request::is('admin/kategori') ? 'active' : '' }}">
                    <a href="{{ route('kategori.index') }}">
                        <i class="fas fa-file-alt mr-2"></i>Kategori Surat</a>
                </li>
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fas fa-tachometer-alt mr-2"></i>About</a>
                </li>
                @elseif(Auth::guard('admin')->user()->level == 'petugas')
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                </li>
                @endif
            </ul>
        </nav>

        <div id="content" style="flex-grow: 1; overflow-y: auto;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-toggler">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="ml-2">
                        <a class="navbar-brand text-white" href="#">Dashboard</a>
                    </div>
                    <!-- <span class="ml-2 badge badge-info">
                        @if(isset($permohonan) && is_array($permohonan))
                            {{ count($permohonan) }} Permohonan
                        @else
                            0 Permohonan
                        @endif
                    </span> -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <a href="{{ route('admin.logout') }}" onclick="return confirmLogout();" class="btn btn-purple btn-sm">Logout</a>

                        </ul>                    
                    </div>
                </div>
            </nav>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fas fa-file-alt mr-2"></i>Arsip Surat
                            </div>
                            <div class="card-body">
                                <!-- Your content here -->
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer mt-auto py-3 bg-dark" style="margin-top: 20px;">
        <div class="container text-center">
        </div>
    </footer>
    
    <!-- jQuery -->
<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    function confirmLogout() {
        return confirm('Anda yakin ingin keluar?');
    }

    $(document).ready(function () {
        // Toggle sidebar on button click
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
@yield('js')
</body>
</html>