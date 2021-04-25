<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 1){
            return view('admin/index');
        }else{
                return view('pakar/index'); 
             }
    }
    public function logout()
    {
      auth()->logout();
      return redirect()->route('login')->with('alert','Silahkan Login Untuk Mengakses Halaman');
    }
}
