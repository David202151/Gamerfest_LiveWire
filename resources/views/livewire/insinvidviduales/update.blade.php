<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Insinvidviduale</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
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
                <label for="observaciones"></label>
                <input wire:model="observaciones" type="text" class="form-control" id="observaciones" placeholder="Observaciones">@error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
