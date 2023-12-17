<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <section class="section">
        <div class="row">
            <!-- Button trigger for full size modal -->
            <div class="col-md-12">
                {{-- <button type="button" class="btn btn-success" wire:click="goAdd">
                    Tambah Data
                </button> --}}

                <hr>
                <h6>Import Excel</h6>
                <a type="button" class="btn btn-success btn-sm" href="{{url('format_saldo_jurnal.xlsx')}}">
                    Format Import Data
                </a>
                <p><br></p>
                <div class="row">
                    <div class="col-md-3">
                        <input type="file" wire:model='file' placeholder="File Import" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <button type="button" wire:click='importData' placeholder="File Import" class="btn btn-success" id="btn-import">Import Data</button>
                    </div>
                </div>
                <hr>
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
                                {{-- @livewire('koperasi.master-barang-taqsith.form') --}}
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

                <!-- full size modal-->
                <div class="modal fade text-left w-100" id="full-scrn-detail" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel20" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel20">Detail Data</h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body" wire:ignore>
                                {{-- <div class="form-group">
                                    <label for="">Tanggal Awal</label>
                                    <input type="date" wire:model="start_date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Akhir</label>
                                    <input type="date" wire:model="end_date" class="form-control">
                                </div> --}}
                                <div class="table-responsive" >
                                    <table class="table table-detail">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Transaksi</th>
                                                <th>Nominal</th>
                                                <th>Debet / Kredit</th>
                                                <th>Saldo Terakhir</th>
                                                <th>Keterangan</th>
                                                <th>Status Transaksi</th>
                                                <th>ID Transaksi</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cust-tbody">

                                        </tbody>

                                    </table>
                                </div>
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
                            <table class="table">
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>WA</th>
                                    <th>Role</th>
                                    <th>Dibuat Tgl</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>{{$user['phone']}}</td>
                                    <td>{{$user['role'][0]['role']['name'] ?? ''}}</td>
                                    <td>{{date('d-m-Y H:i:s',strtotime($user['created_at']))}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                              <a href="{{route('koperasi.topup_tabungan.topup',['id' => \Crypt::encrypt($user)])}}" class="dropdown-item" >TopUp</a>
                                              <a href="{{route('koperasi.topup_tabungan.jurnal',['id' => $user['id']])}}" class="dropdown-item" >Jurnal</a>
                                              <button class="dropdown-item" wire:click="detail('{{\Crypt::encrypt($user)}}')">Lihat</button>
                                            </div>
                                          </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{$users->links()}}

                            </div>
                            <div class="col-md-2">
                                <small>{{$users->total()}} Total Items</small>

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
        window.livewire.on('show-data', info => {
            $("#full-scrn-detail").modal('show');
            document.getElementById("cust-tbody").innerHTML = '';

            // get the current table body html as a string, and append the new row
            var html = document.getElementById("cust-tbody").innerHTML + info;

            // set the table body to the new html code
            document.getElementById("cust-tbody").innerHTML = html;
        })

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('message.sent', (message, component) => {
                // console.log('start');
                document.getElementById('btn-import').setAttribute("disabled", true);
            })

            Livewire.hook('message.processed', (message, component) => {
                // console.log('stop');
                document.getElementById('btn-import').removeAttribute("disabled");
            })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.table-detail').DataTable();
        });
    </script>
@endpush
