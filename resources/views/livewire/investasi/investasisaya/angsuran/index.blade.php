<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <section class="section">
        <div class="row">

            <div class="col-md-12">
                    <div class="form-group row">


                        <div class="row">

                        <div class="col-md">
                            <div class="table-responsive">

                            <table class="table">
                                <tr>
                                    <th>Nama Angsuran</th>
                                    <th>Tanggal</th>
                                    {{-- <th>Nominal</th> --}}
                                    <th>Status Modal Masuk</th>
                                    <th>Status Bagikan Modal</th>


                                    {{-- <th>Dibuat Tgl</th> --}}
                                </tr>
                                @foreach ($rekening as $user)
                                <tr>
                                    <td>{{$user['nama_angsuran']}}</td>
                                    <td>{{$user['tanggal']}}</td>
                                    {{-- <td>{{App\Http\Controllers\Controller::rupiah($user['nominal'])}}</td> --}}
                                    <td>
                                        @if ($user['status'] == 1)
                                            <span class="badge bg-success">Sudah Dibayar</span>
                                        @else
                                            <span class="badge bg-danger">Belum Dibayar</span>

                                        @endif
                                    </td>
                                    <td>
                                        @if ($user['dibagikan_ke_member'] == 1)
                                            <span class="badge bg-success">Sudah Dibayar</span>
                                        @else
                                            <span class="badge bg-danger">Belum Dibayar</span>

                                        @endif
                                    </td>



                                </tr>
                                @endforeach
                            </table>
                        </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{$rekening->links()}}

                            </div>
                            <div class="col-md-2">
                                <small>{{$rekening->total()}} Total Items</small>

                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script>
        window.livewire.on('edit-data', info => {
            $("#full-scrn").modal('show');
        })

    </script>

<script>
    window.livewire.on('edit-data-perpanjangan', info => {
        $("#full-scrn-perpanjangan").modal('show');
    })

</script>

<script>
    window.livewire.on('edit-data-beli-slot', info => {
        $("#full-scrn-beli-slot").modal('show');
    })

</script>
@endpush
