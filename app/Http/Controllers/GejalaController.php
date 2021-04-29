<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;
use Auth;
use Alert;


class GejalaController extends Controller
{
    public function index()
    {
        $gejala =  Gejala::paginate(10);
        return view('pakar/gejala');      
    }
    public function storeGejala(Request $request)
    {
        $request->validate([
            'kode_gejala' => 'required',
            'nama_gejala' => 'required',
        ]);

        gejala::create([
            'kode_gejala' => $request->nama_gejala,
            'nama_gejala' => $request->nama_gejala,
            
        ]);

        Alert::success('Berhasil','Berhasil menambah Gejala baru');
        return redirect()->back();
    }

    public function updateGejala(Request $request)
    {
       
        $request->validate([
            'kode_gejala_update' => 'required',
            'nama_gejala_update' => 'required',
        ]);

        $gejala = Gejala::find($request->gejala_id_update);

        $gejala->update([
            'kode_gejala' => $request->nama_gejala_update,
            'nama_gejala' => $request->nama_gejala_update,
        ]);

        return redirect()->back()->with('success-edit','Berhasil Mengedit Gejala');
    }

    public function deleteGejala($id)
    {
        $gejala = gejala::find($id);
        $gejala->delete();

        return redirect()->back();
    }
}
