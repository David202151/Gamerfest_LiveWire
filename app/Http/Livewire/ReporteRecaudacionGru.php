<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Videojuego;
use Illuminate\Support\Facades\DB;
use App\Models\Insgrupale;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteRecaudacionGru extends Component
{
    public $list,$data;
    
    public function render()
    {
        $list = $this -> getRecaudacion();
        return view('livewire.recaudacionGru.view',$list);
    }

    public function pdf()
    {
        $list = $this->getRecaudacion();
        $pdf = PDF::loadView('livewire.recaudacionGru.pdf',compact('list'));
        return $pdf->stream('REPORTE-Recaudacion'.date('Y-m-d').'.pdf');
    }
    
    public function getRecaudacion(){

        $list=[];
        $nombres=DB::select('SELECT nombre FROM videojuegos where videojuegos.id_categoria like "2"');

        $id=DB::select('SELECT id FROM videojuegos where videojuegos.id_categoria like "2"');
        
        for($i=0; $i < sizeof($nombres);$i++){
           
           array_push($list,[
               'nombre'=>$nombres[$i]->nombre,
               'cantidad'=> Insgrupale::all()->where('id_videjuegos', $id[$i]->id)->count(),
           ]);
           $data['nombre'][] = $nombres[$i]->nombre;
           $data['cantidad'][] = Insgrupale::all()->where('id_videjuegos', $id[$i]->id)->count(); 

        }
        $this->list = $list;
        return $list;
    }
}
