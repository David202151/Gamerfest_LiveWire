<?php

namespace App\Exports;

use App\Models\Horario;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HorarioExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view ('livewire.reportehorarios.export',[
            'horario' => Horario::all()
        ]
        );
    }
}
