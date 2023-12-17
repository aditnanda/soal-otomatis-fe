<div>

    @if (isset($is_show))
        @if ($is_show)
            <button type="button" wire:click="show('{{$model->id}}')" class="btn btn-secondary" ><i class="fa fa-eye"></i></button>
        @endif
    @else

    @endif

    @if (isset($is_print))
        @if ($is_print)
            <button type="button" wire:click="print('{{$model->id}}')" class="btn btn-danger" ><i class="fa fa-print"></i></button>
        @endif
    @else

    @endif

    @if (isset($is_edit))
        @if ($is_edit)
            <button type="button" wire:click="edit('{{$model->id}}')" class="btn btn-warning" {{($model->status == 'valid') ? 'disabled' : ''}}><i class="fa fa-edit"></i></button>
        @endif
    @else
    <button type="button" wire:click="edit('{{$model->id}}')" class="btn btn-warning" {{($model->status == 'valid') ? 'disabled' : ''}}><i class="fa fa-edit"></i></button>

    @endif

    @if (isset($is_delete))
        @if ($is_delete)
            <button type="button" wire:click="delete('{{$model->id}}')" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()" {{($model->status == 'valid') ? 'disabled' : ''}}><i class="fa fa-trash"></i></button>
        @endif
    @else
    <button type="button" wire:click="delete('{{$model->id}}')" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()" {{($model->status == 'valid') ? 'disabled' : ''}}><i class="fa fa-trash"></i></button>

    @endif

</div>