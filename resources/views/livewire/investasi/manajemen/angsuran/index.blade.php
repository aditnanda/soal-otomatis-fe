<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <section class="section">
        <div class="row">
            <!-- Button trigger for full size modal -->
            @if ($inv['jenis_investasi'] != 'taqsith')

            <div class="col-md-12">
                <button type="button" class="btn btn-success" wire:click="goAdd">
                    Tambah Data
                </button>

                <!-- full size modal-->
                <div class="modal fade text-left w-100" id="full-scrn-2" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel20" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel20">Tambah / Edit Data</h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                @livewire('investasi.manajemen.angsuran.form',['id_investasi' => $inv['id']])
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary btn-sm"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-sm-block d-none">Tutup</span>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p><br></p>
            @endif

            <div class="col-md-12">
                    <div class="form-group row">


                        <div class="row">

                        <div class="col-md">
                            <div class="table-responsive">

                            <table class="table">
                                <tr>
                                    <th>Nama Angsuran</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Status Modal Masuk</th>
                                    <th>Status Bagikan Modal</th>
                                    <th>Laporan</th>


                                    {{-- <th>Dibuat Tgl</th> --}}
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($rekening as $user)
                                <tr>
                                    <td>{{$user['nama_angsuran']}}</td>
                                    <td>{{$user['tanggal']}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['nominal'])}}</td>
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
                                            <input type="date" wire:model='tgl.{{$user['id']}}' class="form-control">

                                            <span class="badge bg-danger">Belum Dibayar</span>

                                        @endif
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <input type="file" wire:model='pdf.{{$user['id']}}' class="form-control">
                                            <button class="btn btn-sm btn-primary" wire:click="upload('{{$user['id']}}')">Upload</button>
                                            @if ($user['pdf'])
                                            <a href="{{$base_url.$user['pdf']}}" class="btn btn-sm btn-secondary" target="_blank">Lihat Laporan</a>

                                            @endif
                                        </div>
                                    </td>


                                    {{-- <td>{{date('d-m-Y H:i:s',strtotime($user['created_at']))}}</td> --}}
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                              {{-- <button class="dropdown-item" wire:click="belislot('{{\Crypt::encrypt($user)}}')">Beli Slot</button>
                                              <button class="dropdown-item" wire:click="perpanjangan('{{\Crypt::encrypt($user)}}')">Perpanjang Fase Ini</button> --}}

                                              {{-- <button class="dropdown-item" wire:click="edit('{{\Crypt::encrypt($user)}}')">Edit</button> --}}
                                              {{-- <button class="dropdown-item" wire:click="cancel('{{$user['id']}}')" onclick="return confirm('Apakah Anda yakin ingin membatalkan investasi ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Batalkan Investasi</button> --}}
                                              @if ($user['status'] == 0)
                                              <button class="dropdown-item" wire:click="modalMasuk('{{$user['id']}}')" onclick="return confirm('Apakah Anda yakin ingin mengupdate data ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Modal Masuk</button>
                                              @endif
                                              @if ($user['status'] && $user['dibagikan_ke_member']  == 0)
                                              <button class="dropdown-item" wire:click="modalDibagikan('{{$user['id']}}')" onclick="return confirm('Apakah Anda yakin ingin mengupdate data ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Bagikan Modal</button>
                                              @endif

                                            </div>
                                          </div>
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
        window.livewire.on('edit-data-2', info => {
            $("#full-scrn-2").modal('show');
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
