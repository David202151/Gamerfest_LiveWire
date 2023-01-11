<?php

namespace App\Http\Livewire;

use App\Models\Insgrupale;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Insinvidviduale;
use App\Models\Jugadore;
use App\Models\Videojuego;
class ReporteInsGrupal extends Component
{
    public $list;
    public function render()
    {
        $list = $this -> getJugadores();
        return view('livewire.reporteinscripcciongru.view',$list);
    }

    public function pdf()
    {
        $list=$this->getJugadores();
        $pdf = PDF::loadView('livewire.reporteinscripcciongru.pdf',compact('list'));
        return $pdf->stream('REPORTE-JUGADORES'.date('Y-m-d').'.pdf');
    }
    
    public function getJugadores(){

        $inscripciones = Insgrupale::all();
        $list = [];
        foreach($inscripciones as $inscripcion){
            $inscripciones = Insgrupale::all()->where('id',$inscripcion->id);
            array_push($list,
            [
                'jugador'=>$inscripcion->jugadore->nombre,
                'equipo' =>$inscripcion->equipo->nombre,
                'videojuego'=>$inscripcion->videojuego->nombre,
                'observacion'=>$inscripcion->observaciones,
            ]);
        } 
        
        $this->list = $list;
        return $list;

    }
}
