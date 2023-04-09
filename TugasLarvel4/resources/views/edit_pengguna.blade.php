<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    @vite(['resources/css/crud-petugas.css','resources/js/home.js'])
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
                <a href="{{ route('dashboard.showDataBarang') }}">
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
            <div class="bungkusan">
                <div class="card-conten">
                    <form method="post" action="{{ route('dp.update') }}">
                        @csrf
                        <h3>Edit Data</h3>
                    <table>
                        <tr>
                            <td><label for="id">Id</label></td>
                            <td><input type="number" id="id" name="id" readonly value="{{ $users->id}}"></td>
                        </tr>
                        <tr>
                            <td><label for="namaInput">Nama</label></td>
                            <td><input type="text" id="namaInput" name="namaInput" value="{{ $users->name}}"></td>
                        </tr>
                        <tr>
                            <td><label for="emailInput">Email</label></td>
                            <td><input type="text" id="emailInput" name="emailInput" value="{{ $users->email}}"></td>
                        </tr>
                        <tr>
                            <td><label for="passwordInput">Password</label></td>
                            <td><input type="password" id="passwordInput" name="passwordInput" value="{{ $users->password}}"></td>
                        </tr>
                        <tr>
                            <td><label for="is_adminInput">Level</label></td>
                            <td><select type="radio" id="is_adminInput" name="is_adminInput" value="{{ $users->is_admin}}" >
                                    <option value=0> pengguna</option>
                                    <option value=1> Admin</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Submit" name="submit" id="btnEdit" class="btn">
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </main>



    </section>
    <!-- CONTENT -->
</body>

</html>
