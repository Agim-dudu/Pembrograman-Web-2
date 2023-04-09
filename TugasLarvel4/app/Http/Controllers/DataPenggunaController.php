<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DataPenggunaController extends Controller
{

    public function index()
    {
        return view('data_pengguna');
    }

    public function create()
    {
        return view('data_pengguna');
    }


    public function showDataPengguna()
    {
        $data['users'] = User::all();


        return view('data_pengguna',$data);
    }

    public function store(Request $request)
        {
            $namaInput = $request->input('namaInput');
            $emailInput = $request->input('emailInput');
            $passwordInput = $request->input('passwordInput');
            $is_adminInput = $request->input('is_adminInput');


            // dd($request->input(''));


            $query = DB::table('users')->insert([
                'name' => $namaInput,
                'email' => $emailInput,
                'password' => $passwordInput,
                'is_admin' =>$is_adminInput
            ]);


            if ($query) {
                return redirect()->route('dp.showDataPengguna')->with('success', 'Data Berhasil Ditambahkan');
            } else {
                return redirect()->route('dp.showDataPengguna')->with('failed', 'Data Gagal Ditambahkan');
            }
        }


    public function destroy(int $id)
    {
       $query = DB::table('users')->where('id', $id)->delete();


       if ($query) {
           return redirect()->route('dp.showDataPengguna')->with('success', 'Data Berhasil Dihapus');
       } else {
           return redirect()->route('dp.showDataPengguna')->with('failed', 'Data Gagal Dihapus');
           
       }

    }


    public function edit(int $id)
    {
        $data['users'] = DB::table('users')->where('id', $id)->first();


        return view('edit_pengguna', $data);
    }


    public function update(Request $request, int $id)
        {
            $namaInput = $request->input('namaInput');
            $emailInput = $request->input('emailInput');
            $passwordInput = $request->input('passwordInput');
            $is_adminInput = $request->input('is_adminInput');


            $query = DB::table('users')->where('id', $id)->update([
                'name' => $namaInput,
                'email' => $emailInput,
                'password' => $passwordInput,
                'is_admin' => $is_adminInput
            ]);


            if ($query) {
                return redirect()->route('dp.showDataPengguna')->with('success', 'Data Berhasil Diupdate');
            } else {
                return redirect()->route('dp.showDataPengguna')->with('failed', 'Data Gagal Diupdate');
            }
        }


    // batas data pengguna
}
