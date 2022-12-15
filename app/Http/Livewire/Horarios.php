<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Horario;
use App\Models\Videojuego;
use App\Models\Aula;

class Horarios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_videjuegos, $id_aulas, $tiempo_inicio, $tiempo_fin, $fecha, $observaciones;
    public $updateMode = false;

    public function render()
    {
        $videojuego = Videojuego::pluck('nombre', 'id');
        $aula = Aula::pluck('nombre', 'id');
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.horarios.view',['videojuego'=>$videojuego, 'aula'=>$aula], [
            'horarios' => Horario::latest()
						->orWhere('id_videjuegos', 'LIKE', $keyWord)
						->orWhere('id_aulas', 'LIKE', $keyWord)
						->orWhere('tiempo_inicio', 'LIKE', $keyWord)
						->orWhere('tiempo_fin', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('observaciones', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->id_videjuegos = null;
		$this->id_aulas = null;
		$this->tiempo_inicio = null;
		$this->tiempo_fin = null;
		$this->fecha = null;
		$this->observaciones = null;
    }

    public function store()
    {
        $this->validate([
		'tiempo_inicio' => 'required',
		'tiempo_fin' => 'required',
		'fecha' => 'required',
		'observaciones' => 'required',
        ]);

        Horario::create([ 
			'id_videjuegos' => $this-> id_videjuegos,
			'id_aulas' => $this-> id_aulas,
			'tiempo_inicio' => $this-> tiempo_inicio,
			'tiempo_fin' => $this-> tiempo_fin,
			'fecha' => $this-> fecha,
			'observaciones' => $this-> observaciones
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Horario Successfully created.');
    }

    public function edit($id)
    {
        $record = Horario::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_videjuegos = $record-> id_videjuegos;
		$this->id_aulas = $record-> id_aulas;
		$this->tiempo_inicio = $record-> tiempo_inicio;
		$this->tiempo_fin = $record-> tiempo_fin;
		$this->fecha = $record-> fecha;
		$this->observaciones = $record-> observaciones;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tiempo_inicio' => 'required',
		'tiempo_fin' => 'required',
		'fecha' => 'required',
		'observaciones' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Horario::find($this->selected_id);
            $record->update([ 
			'id_videjuegos' => $this-> id_videjuegos,
			'id_aulas' => $this-> id_aulas,
			'tiempo_inicio' => $this-> tiempo_inicio,
			'tiempo_fin' => $this-> tiempo_fin,
			'fecha' => $this-> fecha,
			'observaciones' => $this-> observaciones
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Horario Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Horario::where('id', $id);
            $record->delete();
        }
    }
}
