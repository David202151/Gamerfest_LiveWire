<?php

namespace App\Exports;

use App\Models\Insgrupale;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InscripccionesgruExport  implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view ('livewire.reporteinscripcciongru.export',[
            'inscripciongru' => Insgrupale::all()
        ]
        );
    }
}

