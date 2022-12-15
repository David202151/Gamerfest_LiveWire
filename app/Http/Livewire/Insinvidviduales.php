<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Insinvidviduale;
use App\Models\Videojuego;
use App\Models\Jugadore;



class Insinvidviduales extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_videjuegos, $id_jugadores, $observaciones;
    public $updateMode = false;

    public function render()
    {
        $videojuego = Videojuego::pluck('nombre', 'id');
        $jugador = Jugadore::pluck('nombre', 'id');
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.insinvidviduales.view',['videojuego'=>$videojuego, 'jugador'=>$jugador], [
            'insinvidviduales' => Insinvidviduale::latest()
						->orWhere('id_videjuegos', 'LIKE', $keyWord)
						->orWhere('id_jugadores', 'LIKE', $keyWord)
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
		$this->id_jugadores = null;
		$this->observaciones = null;
    }

    public function store()
    {
        $this->validate([
		'observaciones' => 'required',
        ]);

        Insinvidviduale::create([ 
			'id_videjuegos' => $this-> id_videjuegos,
			'id_jugadores' => $this-> id_jugadores,
			'observaciones' => $this-> observaciones
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Insinvidviduale Successfully created.');
    }

    public function edit($id)
    {
        $record = Insinvidviduale::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_videjuegos = $record-> id_videjuegos;
		$this->id_jugadores = $record-> id_jugadores;
		$this->observaciones = $record-> observaciones;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'observaciones' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Insinvidviduale::find($this->selected_id);
            $record->update([ 
			'id_videjuegos' => $this-> id_videjuegos,
			'id_jugadores' => $this-> id_jugadores,
			'observaciones' => $this-> observaciones
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Insinvidviduale Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Insinvidviduale::where('id', $id);
            $record->delete();
        }
    }
}
