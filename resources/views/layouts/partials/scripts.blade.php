@php
    $user = @\Session::get('user');
    $user_id = 1;
    if ($user) {
        # code...
        $user_id = $user['id'];

    }
@endphp
<script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('/vendors/tinymce/tinymce.min.js') }}"></script>

<script src="{{ asset('/vendors/toastify/toastify.js') }}"></script>

<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="{{ asset('/js/main.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/1.9.46/autoNumeric.js"></script>
    @yield('script')
@livewireScripts

<script>


    window.livewire.on('notif-success', info => {
        Toastify({
            text: info,
            duration: 5000,
            close:true,
            gravity:"top",
            position: "center",
            backgroundColor: "#4fbe87",
        }).showToast();
    })

    window.livewire.on('notif-warning', info => {
        Toastify({
            text: info,
            duration: 5000,
            close:true,
            gravity:"top",
            position: "center",
            backgroundColor: "#ffc107",
        }).showToast();
    })

    window.livewire.on('notif-danger', info => {
        Toastify({
            text: info,
            duration: 5000,
            close:true,
            gravity:"top",
            position: "center",
            backgroundColor: "#dc3545",
        }).showToast();
    })

    window.livewire.on('close-modal', info => {
        $(".modal").modal('hide');
    })
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.sent', (message, component) => {
            // console.log('start');
            const btnSaveElements = document.querySelectorAll('.btn');
            btnSaveElements.forEach(btn => {
                btn.setAttribute("disabled", true);
            });
        });

        Livewire.hook('message.processed', (message, component) => {
            // console.log('stop');
            const btnSaveElements = document.querySelectorAll('.btn');
            btnSaveElements.forEach(btn => {
                btn.removeAttribute("disabled");
            });
        });
    });
</script>
@stack('scripts')
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}

{{ $script ?? ''}}
