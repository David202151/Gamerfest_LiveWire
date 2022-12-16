<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Evento;
use App\Models\Aula;

class Eventos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $fecha, $id_aulas, $descripcion;
    public $updateMode = false;

    public function render()
    {
        $aula = Aula::pluck('nombre', 'id');
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.eventos.view',['aula'=>$aula], [
            'eventos' => Evento::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('id_aulas', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
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
		$this->nombre = null;
		$this->fecha = null;
		$this->id_aulas = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'fecha' => 'required',
		'descripcion' => 'required',
        ]);

        Evento::create([ 
			'nombre' => $this-> nombre,
			'fecha' => $this-> fecha,
			'id_aulas' => $this-> id_aulas,
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Evento Successfully created.');
    }

    public function edit($id)
    {
        $record = Evento::findOrFail($id);

        $this->selected_id = $id; 
		$this->nombre = $record-> nombre;
		$this->fecha = $record-> fecha;
		$this->id_aulas = $record-> id_aulas;
		$this->descripcion = $record-> descripcion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'fecha' => 'required',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Evento::find($this->selected_id);
            $record->update([ 
			'nombre' => $this-> nombre,
			'fecha' => $this-> fecha,
			'id_aulas' => $this-> id_aulas,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Evento Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Evento::where('id', $id);
            $record->delete();
        }
    }
}
