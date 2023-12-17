<div

    :required="$isRequired()"
    :state-path="$getStatePath()"
    :isi="$getIsi()"
>
    <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }">
        <!-- Interact with the `state` property in Alpine.js -->
        <div class="form-group">
            <label>{{ $getLabel() }}</label>
            <div wire:ignore>
                <select id="category-dropdown" class="form-control" multiple wire:model="{{ $getStatePath() }}">
                    {!! $getIsi() !!}
                </select>
            </div>
        </div>

    </div>
</div>
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script language="JavaScript">
    document.addEventListener("DOMContentLoaded", () => {
        var state_path = '{{$getStatePath()}}';
        $('#category-dropdown').select2();
            $('#category-dropdown').on('change', function (e) {
                let data = $(this).val();
                 @this.set(state_path, data);
            });
            window.livewire.on('productStore', () => {
                $('#category-dropdown').select2();
            });
    });



</script>
@endpush
