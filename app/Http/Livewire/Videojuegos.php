<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Videojuego;

class Videojuegos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $id_categoria, $nombre, $precio, $descripcion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.videojuegos.view', [
            'videojuegos' => Videojuego::latest()
						->orWhere('id_categoria', 'LIKE', $keyWord)
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('precio', 'LIKE', $keyWord)
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
		$this->id_categoria = null;
		$this->nombre = null;
		$this->precio = null;
		$this->descripcion = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'precio' => 'required',
		'descripcion' => 'required',
        ]);

        Videojuego::create([ 
			'id_categoria' => $this-> id_categoria,
			'nombre' => $this-> nombre,
			'precio' => $this-> precio,
			'descripcion' => $this-> descripcion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Videojuego Successfully created.');
    }

    public function edit($id)
    {
        $record = Videojuego::findOrFail($id);

        $this->selected_id = $id; 
		$this->id_categoria = $record-> id_categoria;
		$this->nombre = $record-> nombre;
		$this->precio = $record-> precio;
		$this->descripcion = $record-> descripcion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'precio' => 'required',
		'descripcion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Videojuego::find($this->selected_id);
            $record->update([ 
			'id_categoria' => $this-> id_categoria,
			'nombre' => $this-> nombre,
			'precio' => $this-> precio,
			'descripcion' => $this-> descripcion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Videojuego Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Videojuego::where('id', $id);
            $record->delete();
        }
    }
}
