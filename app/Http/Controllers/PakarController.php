<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pakar;
use App\PakarSyarat;

class PakarController extends Controller
{
    
    public function index()
    {
        $pakar = Pakar::all();
        $pakarSyarat = PakarSyarat::all();
        return view('admin.pakar', compact('pakar', 'pakarSyarat'));
    }

    public function tentang()
    {
        return view('admin.tentang');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $pakar=PakarSyarat::find($id);
        // $pakar->update([
        //     'status'=> $request->status,
        // ]);
        $id = $request->id;
        PakarSyarat::where('id',$id)->update([
            'status'=>$request->status,
        ]);

        return redirect()->back()->with('success-edit','Berhasil MemVerfikasi Pakar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pakar=PakarSyarat::find($id);
        $pakar->delete();
    }
}
