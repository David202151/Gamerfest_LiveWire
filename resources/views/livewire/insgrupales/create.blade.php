<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Insgrupale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="id_jugadores"></label>
                <!-- <input wire:model="id_jugadores" type="text" class="form-control" id="id_jugadores" placeholder="Id Jugadores">@error('id_jugadores') <span class="error text-danger">{{ $message }}</span> @enderror -->
                <select wire:model="id_jugadores" class="form-control" name="" id="id_jugadores">
                <option value="0">-Seleccione-</option>
                    @foreach ($jugador as $id=>$nombre)
                        <option value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_equipos"></label>
                <!-- <input wire:model="id_equipos" type="text" class="form-control" id="id_equipos" placeholder="Id Equipos">@error('id_equipos') <span class="error text-danger">{{ $message }}</span> @enderror -->
                <select wire:model="id_equipos" class="form-control" name="" id="id_equipos">
                <option value="0">-Seleccione-</option>
                    @foreach ($equipo as $id=>$nombre)
                        <option value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_videjuegos"></label>
                <!-- <input wire:model="id_videjuegos" type="text" class="form-control" id="id_videjuegos" placeholder="Id Videjuegos">@error('id_videjuegos') <span class="error text-danger">{{ $message }}</span> @enderror -->
                <select wire:model="id_videjuegos" class="form-control" name="" id="id_videjuegos">
                <option value="0">-Seleccione-</option>
                    @foreach ($videojuego as $id=>$nombre)
                        <option value="{{$id}}">{{$nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="participantes"></label>
                <input wire:model="participantes" type="text" class="form-control" id="participantes" placeholder="Participantes">@error('participantes') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="observaciones"></label>
                <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
