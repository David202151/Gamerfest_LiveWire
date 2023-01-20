<?php

namespace App\Exports;

use App\Models\Insinvidviduale;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InscripccionesindExport  implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view ('livewire.reporteinscripcionind.export',[
            'inscripcionind' => Insinvidviduale::all()
        ]
        );
    }
}
