<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Keuntungan Secara Masal</h4>
                    <div class="form-check form-switch">
                        <input type="number" wire:model="keuntungan" class="form-control" required>
                        <button class="btn btn-primary btn-sm" type="button" onclick="return confirm('Apakah Anda yakin ingin mengubah data ini, tindakan ini mengubah data dan tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()" wire:click="update()">Ubah Keuntungan Masal</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
