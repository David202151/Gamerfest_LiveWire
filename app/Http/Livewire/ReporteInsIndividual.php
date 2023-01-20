<?php

namespace App\Http\Livewire;

use App\Exports\InscripccionesindExport;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Insinvidviduale;
use App\Models\Jugadore;
use App\Models\Videojuego;

class ReporteInsIndividual extends Component
{

    use WithPagination;
    public $list, $keyWord, $id_videjuegos, $id_jugadores, $observaciones; 
    public $updateMode = false;
    
    public function render()
    {
        
        $list = $this -> getJugadores();
        $videojuego = Videojuego::pluck('nombre', 'id');
        $jugador = Jugadore::pluck('nombre', 'id');
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.reporteinscripcionind.view',$list,['videojuego'=>$videojuego, 'jugador'=>$jugador], [
            'insinvidviduales' => Insinvidviduale::latest()
						->whereHas('videojuego', function($query) use ($keyWord) {
                            $query->where('nombre', 'like', $keyWord);
                         })
						->paginate(10),
        ]);
    }

    public function excel()
    {
        return Excel::download(new InscripccionesindExport, 'inscripccionesind.xlsx');
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
