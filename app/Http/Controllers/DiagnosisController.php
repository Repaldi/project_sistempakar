<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;
use App\Penyakit;
use DB;
class DiagnosisController extends Controller
{
    public function index()
    {
        return view('diagnosis');     
    }
    public function prosesDiagnosis()
    {
    
       #Rule 
       if($i = 'G001'){
           if($i = 'G002'){
               $hasil = "Busuk Pangkal" ;              
           }else{
            if($i = 'G003'){
                if($i = 'G004'){
                    if($i = 'G005'){
                        if($i = 'G006'){
                            if($i = 'G007'){
                                 $hasil = "Busuk Akar";
                            }else{
                                if($i = 'G006'){
                                    if($i ='G008'){
                                        if($i = 'G009'){
                                            $hasil = 'Fusariosis';
                                        }
                                    }
                                }
                            }
                        }
                    }else{
                        if($i ='G005'){
                            if($i = 'G010'){
                                $hasil = 'Layu Nanas';
                            }
                        }
                    }
                }
             }
        }
       }
   

        $input = $request->all();
        $input['bobot'] = $request->input('bobot');
        $jumlah_gejala = count($input['bobot']);
       
        $i = $input['bobot'];
        while ($i <= $jumlah_gejala) { 
            $i;
        }

        #Jumlah Hipotesa Gejala
        $jumlah_hipotesa = array_sum($i);
     
        #Hitung Nilai Probabilitas Hipotesis
        $nilai_probabilitas=[];
        foreach($i as $bobot){
            $nilai_probabilitas[]= $bobot / $jumlah_hipotesa;
            
            $nilai_semesta=[];
            foreach($nilai_probabilitas as $np){
                $nilai_semesta[] = $np * $bobot;
                }
            }  
        }
    }
     
    
    
     
        
       
       

      

       
      
      
        
 
       

        
    
    
       
        
        // $i=0;
        
        // for ($i >= 0; $i<=$jumlah_data; $i++) {
        //     if (!$input) { 
        //         $nilai_bobot[i] = 0;
        //     } else {
        //         $nilai_bobot[$i] = $input['bobot'][$i];
        //     }	
		// 	} 
			
  
      
        // if (!$str_json[0]) { $b1 = 0;} else {$b1=$input['bobot'][0];}
        // if (!$str_json[2]) { $b2 = 0;} else {$b2=$input['bobot'][1];}
       
    

