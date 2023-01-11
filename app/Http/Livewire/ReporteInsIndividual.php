<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Insinvidviduale;
use App\Models\Jugadore;
use App\Models\Videojuego;

class ReporteInsIndividual extends Component
{

    public $list; 
    
    public function render()
    {
        $list = $this -> getJugadores();
        return view('livewire.reporteinscripcionind.view',$list);
    }

    public function pdf()
    {
        $list=$this->getJugadores();
        $pdf = PDF::loadView('livewire.reporteinscripcionind.pdf',compact('list'));
        return $pdf->stream('REPORTE-JUGADORES'.date('Y-m-d').'.pdf');
    }
    public function getJugadores(){

        $inscripciones = Insinvidviduale::all();
        $list = [];
        foreach($inscripciones as $inscripcion){
            $inscripciones = Insinvidviduale::all()->where('id',$inscripcion->id);
            array_push($list,
            [
                'jugador'=>$inscripcion->jugadore->nombre,
                'videojuego'=>$inscripcion->videojuego->nombre,
                'observacion'=>$inscripcion->observaciones,
            ]);
        }
        
        $this->list = $list;
        return $list;
        dd($list);

    }
}
