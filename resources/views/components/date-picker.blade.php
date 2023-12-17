@props(['options' => []])

@php
    $options = array_merge([
                    'dateFormat' => 'Y-m-d',
                    'enableTime' => false,
                    'altFormat' =>  'j F Y',
                    'altInput' => true,
                    'disableMobile' => true
                    ], $options);
@endphp

<div wire:ignore>
    <input
        x-data
        x-init="flatpickr($refs.input, {{json_encode((object)$options)}});"
        x-ref="input"
        type="text"
        placeholder="YYYY-mm-dd"
        {{ $attributes->merge(['class' => 'form-control custom-css']) }}
    />
</div>