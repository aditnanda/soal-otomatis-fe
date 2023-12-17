<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Buat Survey</h4>
            </div>

            <div class="card-body">
    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Nama</label>
                                <input type="text" class="form-control" id="basicInput"  wire:model="name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="basicInput"  wire:model="start">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="basicInput"  wire:model="end">
                            </div>
                        </div>
                    </div>
                    
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Buat Pertanyaan Survey</h4>
            </div>

            <div class="card-body">
                
                @foreach ($steps as $stp => $item)
                <div class="row">
                    <div class="col-md-4">
                        <h5>Pertanyaan ke {{$loop->iteration}}</h5>

                    </div>
                    <div class="col-md-3">
                        @if ($stp != 0)
                        <button type="button" class="btn btn-danger btn-sm" wire:click="removeStep('{{$item}}')"><i class="bi bi-trash"></i> Hapus </button>
    
                        @endif
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="basicInput">Pertanyaan</label>
                            <input type="text" class="form-control" id="basicInput"  wire:model="content.{{$stp}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="basicInput">Tipe</label>
                            <select type="text" class="form-control" id="basicInput"  wire:model="type.{{$stp}}">
                                <option value="">Pilih</option>
                                <option value="number">Angka</option>
                                <option value="text">Text</option>
                                <option value="radio">Pilihan</option>
                            </select>
                        </div>
                    </div>
                    @if ($type[$stp] == 'radio')
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="basicInput">Opsi <small>pisahkan dengan koma (,)</small></label>
                            <input type="text" class="form-control" id="basicInput"  wire:model="options.{{$stp}}">
                        </div>
                    </div>
                    @endif        
                   
        
                </div>
                @endforeach
                <button type="button" class="btn btn-warning btn-sm" wire:click="addStep"><i class="bi bi-plus"></i> Tambah Baru </button>
                <div class="row">
                    <p><br></p>
                    <button type="button" class="btn btn-success" wire:click="submit()">Submit</button>

                </div>
            </div>
        </div>
    </section>
    
</div>
