<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <@vite(['resources/css/crud-petugas.css','resources/js/data_pengguna.js']) <title>Data Pengguna</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <h1 style="padding:30px; color:rgb(18, 18, 247);">Halo {{ Auth::user()->name }}</h1>
        <ul class="side-menu top">
            <li>
                <a href="{{route('dashboard.showDataBarang')}}">
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
            <li class="active">@can('admin')
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
                    <h1 id="petugas">Data Pengguna</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{ route('dashboard.showDataBarang') }}">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Data Pengguna</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="table-data">
                <div class="tambah-datapetu">
                    <button class="btn" id="btnTambahPengguna">Tambah Data</button>

                    <div id="myModal2" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>

                            <div class="inputModal">
                                <form method="post" action="{{ route('dp.store') }}">
                                    @csrf
                                    <h3 id="judulModal">Tambah Data</h3>
                                <table>
                                    <tr>
                                        <td><label for="namaInput">Nama</label></td>
                                        <td><input type="text" id="namaInput" name="namaInput"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="emailInput">Email</label></td>
                                        <td><input type="text" id="emailInput" name="emailInput" ></td>
                                    </tr>
                                    <tr>
                                        <td><label for="passwordInput">Password</label></td>
                                        <td><input type="password" id="passwordInput" name="passwordInput" ></td>
                                    </tr>
                                    <tr>
                                        <td><label for="is_adminInput">Level</label></td>
                                        <td><select type="radio" id="is_adminInput" name="is_adminInput">
                                                <option value=0> pengguna</option>
                                                <option value=1> Admin</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Submit" name="submit" id="submit" class="btn">
                                        </td>
                                    </tr>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $n= 1;
                            @endphp
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $n }}</th>
                                <td><h4>{{ $user->name }}</h4></td>
                                <td><h4>{{ $user->email }}</h4></td>
                                <td><h4>{{ ($user->is_admin)== 1 ? "Admin" : "Pelanggan" }}</h4></td>
                                <td style="display: grid; gap:10px; grid-template-column:300px 300px;">
                                    <div>
                                        <a href="{{ route('dp.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div>
                                        <form action="{{ route('dp.destroy',$user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" style="background-color:red" onclick="confirm('Anda yakin akan meenghapus data ini?')">Hapus</button>
                                       </form>
                                    </div>
                                </td>
                            </tr>
                            @php
                            $n++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
    </section>
    <!-- CONTENT -->

</body>

</html>
