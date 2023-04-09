<?php

namespace App\Http\Controllers;

use App\Models\baju;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DataBarangController extends Controller
{

    public function index()
    {
        return view('data_barang');
    }
    public function create()
    {
        return view('data_barang');
    }


    public function showDataBarang()
    {
        $data['baju'] = baju::all();


        return view('data_barang',$data);
    }

    public function store(Request $request)
        {

            $request->validate([
                'namaInput' => 'required',
                'hargaInput' => 'required',
                'stokInput' => 'required',
                'image' => 'required|image|max:10000|:jpg,png,webp,jpeg,gif,svg',
            ]);

            if($request->file('image')){
                $validateDate['image']=$request->file('image')->store('images');
            }


            $namaInput = $request->input('namaInput');
            $hargaInput = $request->input('hargaInput');
            $stokInput = $request->input('stokInput');
            $image = $request->file('image')->store('images');


            // dd($request->input(''));


            $query = DB::table('baju')->insert([
                'nama' => $namaInput,
                'harga' => $hargaInput,
                'stok' => $stokInput,
                'image' => $image,
            ]);


            if ($query) {
                return redirect()->route('db.showDataBarang')->with('success', 'Data Berhasil Ditambahkan');
            } else {
                return redirect()->route('db.showDataBarang')->with('failed', 'Data Gagal Ditambahkan');
            }
        }


    public function destroy(int $id)
    {
       $query = DB::table('baju')->where('id', $id)->delete();


       if ($query) {
           return redirect()->route('db.showDataBarang')->with('success', 'Data Berhasil Dihapus');
       } else {
           return redirect()->route('db.showDataBarang')->with('failed', 'Data Gagal Dihapus');
           
       }

    }


    public function edit(int $id)
    {
        $data['baju'] = DB::table('baju')->where('id', $id)->first();


        return view('edit_poster', $data);
    }


    public function update(Request $request, int $id)
        {

            ddd($request);
            $request->validate([
                'namaInput' => 'required',
                'hargaInput' => 'required',
                'stokInput' => 'required',
                'image' => 'required|image|max:10000|:jpg,png,webp,jpeg,gif,svg',
            ]);

            if($request->file('image')){
                $validateDate['image']=$request->file('image')->store('images');
            }
            
            $namaInput = $request->input('namaInput');
            $hargaInput = $request->input('hargaInput');
            $stokInput = $request->input('stokInput');
            $image = $request->file('image')->store('images');

            $query = DB::table('baju')->where('id', $id)->update([
                'name' => $namaInput,
                'harga' => $hargaInput,
                'stok' => $stokInput,
                'image' => $image
            ]);


            if ($query) {
                return redirect()->route('db.showDataBarang')->with('success', 'Data Berhasil Diupdate');
            } else {
                return redirect()->route('db.showDataBarang')->with('failed', 'Data Gagal Diupdate');
            }
        }
}
