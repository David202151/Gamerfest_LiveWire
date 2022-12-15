<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Insgrupale;

class Insgrupales extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_jugadores, $id_equipos, $id_videjuegos, $participantes, $observaciones;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.insgrupales.view', [
            'insgrupales' => Insgrupale::latest()
						->orWhere('id_jugadores', 'LIKE', $keyWord)
						->orWhere('id_equipos', 'LIKE', $keyWord)
						->orWhere('id_videjuegos', 'LIKE', $keyWord)
						->orWhere('participantes', 'LIKE', $keyWord)
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
		$this->id_jugadores = null;
		$this->id_equipos = null;
		$this->id_videjuegos = null;
		$this->participantes = null;
		$this->observaciones = null;
    }

    public function store()
    {
        $this->validate([
		'participantes' => 'required',
		'observaciones' => 'required',
        ]);

        Insgrupale::create([ 
			'id_jugadores' => $this-> id_jugadores,
			'id_equipos' => $this-> id_equipos,
			'id_videjuegos' => $this-> id_videjuegos,
			'participantes' => $this-> participantes,
			'observaciones' => $this-> observaciones
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Insgrupale Successfully created.');
    }

    public function edit($id)
    {
        $record = Insgrupale::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_jugadores = $record-> id_jugadores;
		$this->id_equipos = $record-> id_equipos;
		$this->id_videjuegos = $record-> id_videjuegos;
		$this->participantes = $record-> participantes;
		$this->observaciones = $record-> observaciones;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'participantes' => 'required',
		'observaciones' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Insgrupale::find($this->selected_id);
            $record->update([ 
			'id_jugadores' => $this-> id_jugadores,
			'id_equipos' => $this-> id_equipos,
			'id_videjuegos' => $this-> id_videjuegos,
			'participantes' => $this-> participantes,
			'observaciones' => $this-> observaciones
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Insgrupale Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Insgrupale::where('id', $id);
            $record->delete();
        }
    }
}
