<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteModal">Agregar Marca</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="storeBrand">
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nombre de la marca</label>
                    <input type="text" wire:model.defer="name" class="form-control">
                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Nombre Slug</label>
                    <input type="text" wire:model.defer="slug" class="form-control">
                    @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                    <label>Estatus</label><br/>
                    <input type="checkbox" wire:model.defer="status" />Checked=Oculto, sin-Checked = Visible
                    @error('status') <small class="text-danger">{{$message}}</small> @enderror
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>

      </div>
    </div>
</div>
