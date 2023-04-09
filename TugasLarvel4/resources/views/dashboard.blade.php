<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    @vite(['resources/css/dashboard.css','resources/js/home.js'])
    <title>Tapasan</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <h1 style="padding:30px; color:rgb(18, 18, 247);">Halo {{ Auth::user()->name }}</h1>
        <ul class="side-menu top">
            <li>
                <a href="{{ route('dashboard.showDataBarang') }}" class="active">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#mp">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Metal Poster</span>
                </a>
            </li>
            <li>@can('admin')
                <a href="{{ route('dp.showDataPengguna') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Data Pengguna</span>
                </a>
                @endcan
            </li>
            <li>@can('admin')
                <a href="{{ route('db.showDataBarang') }}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Data Barang</span>
                </a>
                @endcan
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="{{ route('login.logout') }}" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Dudu-Store</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="">
            </a>
        </nav>
        <main>
          <div class="head-title">
                <div class="left">
                    <h1 id="mp">Metal Poster</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{ route('dashboard.showDataBarang') }}">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                    </ul>
                </div>
            </div>  
        <table>
            <div class="conten1">
                @foreach ($baju as $bajuu)
                <div class="card1">
                    <img src="{{asset('storage/'.$bajuu->image)}}" alt=""></td>
                    <h4>Nama : {{ $bajuu->nama }}</h4>
                    <h4>Stok : {{ $bajuu->stok}}</h4>
                    <h4>Harga : Rp.{{ $bajuu->harga }}</h4>
                    <button class="btn btn-primary" style="padding: 8px; margin-top:10px;">CheckOut</button>
                </div>
                @endforeach
            </div>
        </table>         
        </main>



    </section>
    <!-- CONTENT -->


    <script src="home.js"></script>
</body>

</html>
