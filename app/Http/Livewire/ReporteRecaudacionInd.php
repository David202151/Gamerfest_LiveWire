<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Videojuego;
use Illuminate\Support\Facades\DB;
use App\Models\Insinvidviduale;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteRecaudacionInd extends Component
{
    public $list,$data;
    
    public function render()
    {
        $list = $this -> getRecaudacion();
        
        return view('livewire.recaudacionInd.view',$list);
    }

    public function pdf()
    {
        $list = $this->getRecaudacion();
        $pdf = PDF::loadView('livewire.recaudacionInd.pdf',compact('list'));
        return $pdf->stream('REPORTE-Recaudacion'.date('Y-m-d').'.pdf');
    }
    
    public function getRecaudacion(){

        $list=[];
        $nombres=DB::select('SELECT nombre FROM videojuegos where videojuegos.id_categoria like "1"');

        $id=DB::select('SELECT id FROM videojuegos where videojuegos.id_categoria like "1"');
        
        for($i=0; $i < sizeof($nombres);$i++){
           
           array_push($list,[
               'nombre'=>$nombres[$i]->nombre,
               'cantidad'=> Insinvidviduale::all()->where('id_videjuegos', $id[$i]->id)->count(),
           ]);
           $data['nombre'][] = $nombres[$i]->nombre;
           $data['cantidad'][] = Insinvidviduale::all()->where('id_videjuegos', $id[$i]->id)->count(); 

        }
        $this->list = $list;
        return $list;
    }
}
