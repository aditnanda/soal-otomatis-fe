{{-- fields/custom-field.blade.php --}}
<div class="form-group row" wire:ignore>
    <label for="{{ $field->name }}" class="col-md-2 col-form-label text-md-right">
        {{ $field->label }}
    </label>

    <div class="col-md">
        <button class="btn btn-secondary" type="button" wire:click='ayo_refresh()'>Klik untuk refresh</button>
        <input
            id="{{ $field->name }}"
            type="text"
            class="custom-field-class form-control @error($field->key) is-invalid @enderror"  readonly>

        @include('laravel-livewire-forms::fields.error-help')
    </div>
</div>

@push('scripts')
<script type="text/javascript">

    $("#{{ $field->name }}").autoNumeric('init', {
       aSep: '.',
       aDec: ',',
       aForm: true,
       vMax: '999999999',
        vMin: '-999999999'
   });


    window.livewire.on('set-nominal-readonly', info => {
        console.log(info)
        $("#{{ $field->name }}").val(info);
    })
</script>
@endpush
