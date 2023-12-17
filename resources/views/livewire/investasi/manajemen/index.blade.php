<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <section class="section">
        <div class="row">
            <!-- Button trigger for full size modal -->
            <div class="col-md-12">
                <button type="button" class="btn btn-success" wire:click="goAdd">
                    Tambah Data
                </button>

                <!-- full size modal-->
                <div class="modal fade text-left w-100" id="full-scrn" tabindex="-1" role="dialog"
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
                                @livewire('investasi.manajemen.form')
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

            <div class="col-md-12">


                <!-- full size modal-->
                <div class="modal fade text-left w-100" id="full-scrn-perpanjangan" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel20" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel20">Perpanjangan Fase</h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                @livewire('investasi.manajemen.perpanjangan-fase')
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

            <div class="col-md-12">


                <!-- full size modal-->
                <div class="modal fade text-left w-100" id="full-scrn-beli-slot" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel20" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel20">Beli Slot</h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                @livewire('investasi.manajemen.beli-slot')
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
            <div class="col-md-12">
                    <div class="form-group row">


                        <div class="row">
                            <div class="col-md-4 text-left">
                                <div class="form-group">
                                    <label for="">Cari</label>
                                    <input id="name" type="text" class="form-control " autocomplete="" placeholder="Ketik Untuk Mencari" wire:model="search">
                                </div>
                            </div>

                            <div class="col-md-2 text-right">
                                <div class="form-group">
                                    <label for="">Per Halaman</label>
                                    <select id="name" type="text" class="form-control " autocomplete="" placeholder="Ketik Untuk Mencari" wire:model="perPage">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="table-responsive">

                            <table class="table">
                                <tr>
                                    <th>Nama Investasi</th>
                                    <th>Nama Pihak</th>
                                    <th>Total Investasi</th>
                                    <th>Tgl Pengumpulan Dana</th>
                                    <th>Dokumen</th>
                                    {{-- <th>Status</th> --}}

                                    {{-- <th>Dibuat Tgl</th> --}}
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($rekening as $user)
                                <tr>
                                    <td>{{$user['nama_investasi']}}</td>
                                    <td>{{$user['nama_pihak']}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['total_investasi'])}}</td>
                                    <td>{{$user['start_pengumpulan_dana']}}
                                        <br>s/d<br>

                                        {{$user['end_pengumpulan_dana']}}</td>
                                    <td>
                                        <a href="{{$base_url.$user['pdf']}}" class="btn btn-primary btn-sm">Unduh</a>
                                    </td>
                                    {{--  --}}

                                    {{-- <td>{{date('d-m-Y H:i:s',strtotime($user['created_at']))}}</td> --}}
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                              {{-- <button class="dropdown-item" wire:click="belislot('{{\Crypt::encrypt($user)}}')">Beli Slot</button>
                                              <button class="dropdown-item" wire:click="perpanjangan('{{\Crypt::encrypt($user)}}')">Perpanjang Fase Ini</button> --}}

                                              <button class="dropdown-item" wire:click="edit('{{\Crypt::encrypt($user)}}')">Edit</button>
                                              <a class="dropdown-item" href="{{route('investasi.manajemen.detail',['inv' => $user['id']])}}">Detail</a>
                                              {{-- <button class="dropdown-item" wire:click="cancel('{{$user['id']}}')" onclick="return confirm('Apakah Anda yakin ingin membatalkan investasi ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Batalkan Investasi</button> --}}
                                              <button class="dropdown-item" wire:click="delete('{{$user['id']}}')" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Hapus</button>

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
