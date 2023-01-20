<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Videojuego;
use Illuminate\Support\Facades\DB;
use App\Models\Insgrupale;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteRecaudacionGru extends Component
{
    public $list,$total;
    
    public function render()
    {
        $list = $this -> getRecaudacion();
        return view('livewire.recaudacionGru.view',$list);
    }

    public function pdf()
    {
        $list = $this->getRecaudacion();
        $total = $this ->total;
        $pdf = PDF::loadView('livewire.recaudacionGru.pdf',compact('list','total'));
        return $pdf->stream('REPORTE-Recaudacion'.date('Y-m-d').'.pdf');

    }
    
    public function getRecaudacion(){

        $list=[];
        $nombres=DB::select('SELECT nombre FROM videojuegos where videojuegos.id_categoria like "2"');
        $id=DB::select('SELECT id FROM videojuegos where videojuegos.id_categoria like "2"');
        $total= DB::select('SELECT SUM(precio) as suma FROM videojuegos as v, insgrupales  WHERE v.id =  insgrupales.id_videjuegos');
        $num = $id[0]->id;
        
        for($i=0; $i < sizeof($nombres);$i++){
            $num = $id[$i]->id;
            $precio = DB::select('SELECT SUM(precio) as suma FROM videojuegos as v, insgrupales  WHERE v.id =  insgrupales.id_videjuegos and v.id like ?',[$num]);
           array_push($list,[
               'nombre'=>$nombres[$i]->nombre,
               'cantidad'=> Insgrupale::all()->where('id_videjuegos', $id[$i]->id)->count(),
               'precio' => $precio[0]->suma,
           ]);
           
        }
        
        $this ->total =$total[0]->suma;
        $this->list = $list;
        return $list;
    }
}
