<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengetahuan;
class PengetahuanController extends Controller
{
    public function admin()
    {
        $pengetahuan=  Pengetahuan::paginate(10);
        return view('admin/pengetahuan');      
    }
    public function storePengetahuan(Request $request)
    {
       
    }
}
