<div>

    <div class="form-group" wire:ignore>
        <select class="form-control form-control-sm" id="status-table-{{$model->id}}" onchange="setStatus('{{$model->id}}')" {{(auth()->user()->role == 'user') ? 'disabled' : ''}}>
            <option value="menunggu_validasi" {{($model->status == 'menunggu_validasi') ? 'selected' : ''}}>Menunggu Validasi</option>
            <option value="tidak_valid" {{($model->status == 'tidak_valid') ? 'selected' : ''}}>Tidak Valid</option>
            <option value="valid" {{($model->status == 'valid') ? 'selected' : ''}}>Valid</option>
        </select>
        
    </div>

</div>

@push('scripts')
    <script>
        function setStatus(id){
            var stts = document.getElementById("status-table-"+id).value;
            @this.call('setStatus',id,stts)
        }
    </script>
@endpush