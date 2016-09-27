<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Periodico;

class EdicionController extends Controller
{
   
    public function periodico()
    {    $fecha_actual=date("Y-m-d"); 
         $edicions = DB::table('periodicos')
         			->where('fecha_active', '=', $fecha_actual)
         			->get();
        if(empty($edicions))
        {

         $fecha_anterior=$this->dia_anterior($fecha_actual);
         $edicions = DB::table('periodicos')
         			->where('fecha_active', '=', $fecha_anterior)
         			->get();
        }
         			
        return view('periodico',compact('edicions'));
    }


    public function dia_anterior($fecha) 
	{ 
    $sol = (strtotime($fecha) - 3600); 
    return date('Y-m-d', $sol); 
	}  
}
