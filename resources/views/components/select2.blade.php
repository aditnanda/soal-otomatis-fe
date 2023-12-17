
<style>
    .custom-select2{

    }
</style>
<div
    
    wire:ignore
>
    <select x-ref="select" 
    x-data="{model : @entangle($attributes->wire('model'))}"
    x-init="
        select2 = $($refs.select)
            .select2({
                dropdownAutoWidth: true,
                width: '100%',
                minimumResultsForSearch: 10,
            });
        select2.on('select2:select', (event) => {
            model = event.params.data.id;
            {{-- if (event.target.hasAttribute('multiple')) { model = Array.from(event.target.options).filter(option => option.selected).map(option => option.value); } else { model = event.params.data.id } --}}
        });
        
    "
    {{ $attributes->merge(['class' => 'form-control custom-select2']) }}>
        {{ $slot }}
    </select>
</div>