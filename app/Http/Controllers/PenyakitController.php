<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;
use Auth;
use Alert;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakit =  Penyakit::paginate(10);
        return view('pakar/penyakit');      
    }
    public function storePenyakit(Request $request)
    {
        $this->validate($request,['foto' => 'nullable|file|image|mimes:png,jpg,jpeg,gif']);
        $request->validate([
            'nama_penyakit' => 'required',
            'detail_penyakit' => 'required',
            'saran_penyakit' => 'required',
            
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'images/penyakit';
            $file->move($tujuan_upload,$nama_file);
        }else {
            $nama_file = null;
        }

        penyakit::create([
            'nama_penyakit' => $request->nama_penyakit,
            'detail_penyakit' => $request->detail_penyakit,
            'saran_penyakit' => $request->saran_penyakit,
            'foto' => $nama_file
        ]);

        Alert::success('Berhasil','Berhasil menambah Penyakit baru');
        return redirect()->back();
    }

    public function updatePenyakit(Request $request)
    {
        $this->validate($request,['foto_update' => 'nullable|file|image|mimes:png,jpg,jpeg,gif']);
        $request->validate([
            'nama_penyakit_update' => 'required',
            'detail_penyakit_update' => 'required',
            'saran_penyakit_update' => 'required',
            
        ]);

        $penyakit = Penyakit::find($request->penyakit_id_update);

        if ($request->hasFile('foto_update')) {
            $file = $request->file('foto_update');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'images/penyakit';
            $file->move($tujuan_upload,$nama_file);
        }else {
            $nama_file = $penyakit->file;
        }

        $penyakit->update([
            'nama_penyakit' => $request->nama_penyakit_update,
            'detail_penyakit' => $request->detail_penyakit_update,
            'saran_penyakit' => $request->saran_penyakit_update,
            'foto' => $nama_file
        ]);

        return redirect()->back()->with('success-edit','Berhasil Mengedit Penyakit');
    }

    public function deletePenyakit($id)
    {
        $penyakit = Penyakit::find($id);
        $penyakit->delete();

        return redirect()->back();
    }


}
