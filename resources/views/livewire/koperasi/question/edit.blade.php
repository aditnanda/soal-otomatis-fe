<div>
    {{-- In work, do what you enjoy. --}}
    <form>
    
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="basicInput">Pertanyaan</label>
                    <input type="text" class="form-control" id="basicInput"  wire:model="content">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="basicInput">Tipe</label>
                    <select type="text" class="form-control" id="basicInput"  wire:model="type">
                        <option value="number">Angka</option>
                        <option value="text">Text</option>
                        <option value="radio">Pilihan</option>
                    </select>
                </div>
            </div>
            @if ($type == 'radio')
            <div class="col-md-12">
                <div class="form-group">
                    <label for="basicInput">Opsi <small>pisahkan dengan koma (,)</small></label>
                    <input type="text" class="form-control" id="basicInput"  wire:model="options">
                </div>
            </div>
            @endif

            <button type="button" class="btn btn-success" wire:click="submit()">Submit</button>
        </div>
    </form>
</div>
