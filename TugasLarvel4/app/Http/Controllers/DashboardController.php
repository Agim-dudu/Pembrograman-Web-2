<?php

namespace App\Http\Controllers;
use App\Models\baju;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    // batas data pengguna



    public function showDataBarang()
    {
        $data['baju'] = baju::all();


        return view('dashboard',$data);
    }


}
