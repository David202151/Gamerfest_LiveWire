<?php

namespace App\Http\Livewire;

use App\Exports\HorarioExport;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\Component;
use App\Models\Horario;
use App\Models\Aula;
use App\Models\Videojuego;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteHorarios extends Component
{
    public $fecha, $listado;
    public function render()
    
    {
        $fecha = '%'.$this->fecha .'%';
        return view('livewire.reportehorarios.view');
    }

    public function excel()
    {
        return Excel::download(new HorarioExport, 'horarios.xlsx');
    }
    public function pdf()
    {
        $fecha = $_GET['fecha'];
        //$mes_lbl=$meses[$mes];
        $lista = $this->getHorarios($fecha);
        $pdf = PDF::loadView('livewire.reportehorarios.pdf',compact('lista','fecha'));
        return $pdf->stream('REPORTE-Horarios'.date('Y-m-d').'.pdf');
    }

    public function getHorarios($fecha){
        $horarios = Horario::all();
        $listado = [];
        foreach($horarios as $horario){
            $horarios = Horario::all()->where('id',$horario->id)->where('fecha',$fecha);
            array_push($listado,
            [
                'id_videojuego'=>$horario->videojuego->nombre,
                'id_aula'=>$horario->aula->nombre,
                'observacion'=>$horario->observaciones,

            ]);

        }
        $this->listado = $listado;
        return $listado;
        
    }
}
