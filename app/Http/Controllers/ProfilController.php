<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Pakar;
use App\PakarSyarat;
use File;
class ProfilController extends Controller
{
    public function storeProfilPakar(Request $request)
    {
    
      $this->validate($request,[
            'user_id' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required',
            'foto' => 'required|file|image|mimes:png,jpg,jpeg',
        ]);

        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images/profil';
        $file->move($tujuan_upload,$nama_file);

        $profil = Pakar::create([
            'user_id' => $request->user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            'foto' => $nama_file,
        ]);
        // dd($profil);
        return redirect()->back()
        ->with('success','Data Profil berhasil di simpan');
    }
    public function updateProfilPakar(Request $request)
    {
        
        $this->validate($request,[
            'foto' => 'nullable|file|image|mimes:png,jpg,jpeg',
        ]);


        $pakar = Pakar::findorFail(Auth::user()->pakar->id); //tampilkan profil
        $nama_file= $pakar->foto; //simpan nama file foto yang sudah ada

        if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'images/profil';
        $file->move($tujuan_upload,$nama_file);
        File::delete('images/profil'.$pakar->foto);
        }
        $update = [
             'user_id' => $request->user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nomor_hp' => $request->nomor_hp,
            'foto' => $nama_file,
        ];

        Pakar::whereId($pakar->id)->update($update);
        return redirect()->back()
        ->with('success','Data Profil berhasil di update');
    }


   

    public function storePakarSyarat(Request $request)
    {
    
      $this->validate($request,[
            'pakar_id' => 'required',
            'dokumen' => 'required|file|mimes:docx,pdf,doc',
        ]);

        $file = $request->file('dokumen');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'dokumen/persyatan';
        $file->move($tujuan_upload,$nama_file);

        $pakar_syarat = PakarSyarat::create([
            'pakar_id' => $request->pakar_id,
            'dokumen' => $nama_file,
        ]);
        return redirect()->back()
        ->with('success','Data Persyaratan berhasil di simpan');
    }

}
