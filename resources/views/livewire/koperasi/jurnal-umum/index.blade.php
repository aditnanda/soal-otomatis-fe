<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <section class="section">
        <div class="row">
            <!-- Button trigger for full size modal -->
            <div class="col-md-12">
                {{-- <button type="button" class="btn btn-success" wire:click="goAdd">
                    Tambah Data
                </button> --}}
                <a type="button" class="btn btn-success" href="{{route('koperasi.jurnal_umum.tambah')}}">
                    Tambah Data
                </a>
                <hr>
                <h6>Import Excel</h6>
                <a type="button" class="btn btn-success btn-sm" href="{{url('format_jurnal.xlsx')}}">
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Bulan</label>
                        <select name="" id="" class="form-control" wire:model="bulan" wire:change='init_data'>
                            <option value="">Pilih Bulan</option>
                            @for ($i = 1; $i <= 12; $i++)
                            <option value="{{($i < 10) ? '0'.$i : $i}}">{{($i < 10) ? '0'.$i : $i}}</option>

                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <select name="" id="" class="form-control" wire:model="tahun" wire:change='init_data'>
                            <option value="">Pilih Tahun</option>
                            @for ($i = 2021; $i <= 2030; $i++)
                            <option value="{{$i}}">{{$i}}</option>

                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-info" wire:click="goCetak">
                        Cetak Data
                    </button>
                </div>

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
                                @livewire('koperasi.jurnal-umum.form')
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
                <div class="modal fade text-left" id="full-scrn-detail" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel20" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel20">Detail Data</h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        @foreach ($data_detail as $key => $item)
                                        <tr>
                                            <th style="width: 30%">{{ucfirst(str_replace("_"," ",$key))}}</th>
                                            <td style="width: 70%">{{$item}}</td>
                                        </tr>
                                        @endforeach
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
                            <div class="table-responsive">

                            <table class="table">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jurnal</th>
                                    <th>Nominal</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($jurnal_umum as $user)
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($user as $usr)
                                        @if ($usr['d_k'] == 'debet')
                                            @php
                                                $total += $usr['nominal'];
                                            @endphp
                                        @endif

                                    @endforeach
                                <tr>
                                    <td>{{@$usr['tanggal']}}</td>
                                    <td>{{@$usr['jurnal']}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah(@$total)}}</td>


                                    {{-- <td>{{date('d-m-Y H:i:s',strtotime(@$user['created_at']))}}</td> --}}
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                              <button class="dropdown-item" wire:click="edit('{{\Crypt::encrypt($usr['jurnal'])}}')">Edit</button>
                                              <button class="dropdown-item" wire:click="delete('{{$usr['jurnal']}}')" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Hapus</button>

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
                                {{$jurnal_umum->links()}}

                            </div>
                            <div class="col-md-2">
                                <small>{{$jurnal_umum->total()}} Total Items</small>

                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    window.livewire.on('go-cetak', info => {
            window.open(info);
        })
</script>
    <script>
        window.livewire.on('edit-data', info => {
            $("#full-scrn").modal('show');
        })
        window.livewire.on('show-data', info => {
            $("#full-scrn-detail").modal('show');
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
@endpush
