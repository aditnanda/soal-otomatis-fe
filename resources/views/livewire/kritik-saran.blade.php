<div>
    {{-- Be like water. --}}
    <div class="form-group">
        <p>Status : {!!($row['status_report']) ? '<span class="badge bg-success">Sudah Ditanggapi</span>' : '<span class="badge bg-warning">Belum Ditanggapi</span>'!!}</p>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" wire:model="catatan.{{$row['id']}}" placeholder="Isi Tanggapan">
    </div>
    <button class="btn btn-sm btn-success" wire:click="setCatatan">Simpan</button>

</div>
