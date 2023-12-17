<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Vendors -->
<link rel="stylesheet" href="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('/vendors/bootstrap-icons/bootstrap-icons.css') }}">
<link rel="stylesheet" href="{{ asset('/vendors/iconly/bold.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('/vendors/toastify/toastify.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}

@livewireStyles

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
    .counter.counter-lg {
    top: -24px !important;
}
.counter {
    position: relative;
    top: -23px;
    left: auto;
    z-index: 2;
    padding: 1px 7px;
    margin-left: -23px;
    font-size: 11px;
    color: #fff;
    background-color: #fe1212;
    border-radius: 10em;
    -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
    box-shadow: 0 2px 5px 0rgba(0,0,0,0.16),0 2px 10px 0rgba(0,0,0,0.12);
}
</style>
<style>
    
</style>

{{ $style ?? '' }}