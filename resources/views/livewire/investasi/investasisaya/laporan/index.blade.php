<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <section class="section">
        <div class="row">
            <!-- Button trigger for full size modal -->
            <div class="col-md-12">


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
                                @livewire('investasi.manajemen.laporan.form',['id_investasi' => $inv['id']])
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
                                    <th>Nama Laporan</th>
                                    <th>Tanggal</th>
                                    <th>PDF</th>
                                    

                                    {{-- <th>Dibuat Tgl</th> --}}
                                </tr>
                                @foreach ($rekening as $user)
                                <tr>
                                    <td>{{$user['nama_laporan']}}</td>
                                    <td>{{$user['tanggal']}}</td>

                                    <td>
                                        <a href="{{$base_url.$user['pdf']}}" class="btn btn-primary btn-sm">Unduh</a>
                                    </td>
                                    
                                    
                                    {{-- <td>{{date('d-m-Y H:i:s',strtotime($user['created_at']))}}</td> --}}
                                   
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