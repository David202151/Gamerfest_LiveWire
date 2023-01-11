<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Videojuego;
use Illuminate\Support\Facades\DB;
use App\Models\Insinvidviduale;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteRecaudacionInd extends Component
{
    public $list, $total, $totalins;
    
    public function render()
    {
        
        $list = $this -> getRecaudacion();
        
        return view('livewire.recaudacionInd.view',$list);
    }

    public function pdf()
    {
        $list = $this->getRecaudacion();
        $total = $this->total;
        $pdf = PDF::loadView('livewire.recaudacionInd.pdf',compact('list','total'));
        return $pdf->stream('REPORTE-Recaudacion'.date('Y-m-d').'.pdf');
    }
    
    public function getRecaudacion(){

        $list=[];
        $nombres=DB::select('SELECT nombre FROM videojuegos where videojuegos.id_categoria like "1"');
        $id=DB::select('SELECT id FROM videojuegos where videojuegos.id_categoria like "1"');  
        $total= DB::select('SELECT SUM(precio) as suma FROM videojuegos as v, insinvidviduales  WHERE v.id =  insinvidviduales.id_videjuegos ');
        $total_inscripcion = DB::select('SELECT COUNT(*) as ins FROM insinvidviduales');
        $total_ins =Insinvidviduale::all()->count();
        //dd($total_ins);

        for($i=0; $i < sizeof($nombres);$i++){
            $num = $id[$i]->id;
            $precio = DB::select('SELECT SUM(precio) as suma FROM videojuegos as v, insinvidviduales  WHERE v.id =  insinvidviduales.id_videjuegos and v.id like ?',[$num]);
           array_push($list,[
               'nombre'=>$nombres[$i]->nombre,
               'cantidad'=> Insinvidviduale::all()->where('id_videjuegos', $id[$i]->id)->count(),
               'precio' => $precio[0]->suma,
           ]);

        }
        
       // $this ->totalins ->$total_ins ;
        $this ->total =$total[0]->suma;
        $this ->list = $list;
        return $list;
        
    }
}
