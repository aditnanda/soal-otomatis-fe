<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <section class="section">
        <div class="row">
            <!-- Button trigger for full size modal -->
            <div class="col-md-12">
                <a href="{{url('/koperasi/pembelian_barang')}}" type="button" class="btn btn-success" >
                    Tambah Data
                </a>

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
                                @livewire('koperasi.master-barang-taqsith.form')
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

                <div class="modal fade text-left w-100" id="full-scrn-pelunasan" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel20" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel20">Pelunasan</h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
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
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        @foreach ($data_detail as $key => $item)
                                            @if (ucfirst(str_replace("_"," ",$key)) == 'Biaya perlengkapan')
                                            <tr>
                                                <th style="width: 30%">{{ucfirst(str_replace("_"," ",$key))}}</th>
                                                <td style="width: 70%">{{App\Http\Controllers\Controller::rupiah($item)}}</td>
                                            </tr>

                                            @elseif (ucfirst(str_replace("_"," ",$key)) == 'Nominal dp')
                                            <tr>
                                                <th style="width: 30%">{{ucfirst(str_replace("_"," ",$key))}}</th>
                                                <td style="width: 70%">{{App\Http\Controllers\Controller::rupiah($item)}}</td>
                                            </tr>

                                            @elseif (ucfirst(str_replace("_"," ",$key)) == 'Nominal utang')
                                            <tr>
                                                <th style="width: 30%">{{ucfirst(str_replace("_"," ",$key))}}</th>
                                                <td style="width: 70%">{{App\Http\Controllers\Controller::rupiah($item)}}</td>
                                            </tr>

                                            @elseif (gettype(@$item) != 'array')

                                                @if (str_contains(@$key,'barang'))

                                                    @if (str_contains(@$key,'bobot'))
                                                    {{-- {{dd($item)}} --}}
                                                    <tr>
                                                        <th style="width: 30%">{{ucfirst(str_replace("_"," ",$key))}}</th>
                                                        <td style="width: 70%">{{@$item }} ({{@$data_detail['satuan_bobot']['satuan_uom']}})</td>
                                                    </tr>
                                                    @elseif (str_contains(@$key,'panjang'))
                                                    <tr>
                                                        <th style="width: 30%">{{ucfirst(str_replace("_"," ",$key))}}</th>
                                                        <td style="width: 70%">{{@$item }} ({{@$data_detail['satuan_panjang']['satuan_uom']}})</td>
                                                    </tr>
                                                    @elseif (str_contains(@$key,'lebar'))
                                                    <tr>
                                                        <th style="width: 30%">{{ucfirst(str_replace("_"," ",$key))}}</th>
                                                        <td style="width: 70%">{{@$item }} ({{@$data_detail['satuan_lebar']['satuan_uom']}})</td>
                                                    </tr>
                                                    @elseif (str_contains(@$key,'tinggi'))
                                                    <tr>
                                                        <th style="width: 30%">{{ucfirst(str_replace("_"," ",$key))}}</th>
                                                        <td style="width: 70%">{{@$item }} ({{@$data_detail['satuan_tinggi']['satuan_uom']}})</td>
                                                    </tr>
                                                    @else
                                                    <tr>
                                                        <th style="width: 30%">{{ucfirst(str_replace("_"," ",$key))}}</th>
                                                        <td style="width: 70%">{{@$item }}</td>
                                                    </tr>
                                                    @endif

                                                @else
                                                <tr>
                                                    <th style="width: 30%">{{ucfirst(str_replace("_"," ",$key))}}</th>
                                                    <td style="width: 70%">{{@$item }}</td>
                                                </tr>
                                                @endif

                                            @endif

                                        @endforeach
                                    </table>
                                </div>

                                @livewire('koperasi.master-barang-taqsith.pelunasan',['id_data'=>\Crypt::encrypt($master_jenis_barang)])

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Rekening
                                                </th>
                                                <th>
                                                    Nominal
                                                </th>
                                                <th>
                                                    Bukti
                                                </th>
                                                <th>
                                                    Keterangan
                                                </th>
                                                <th>
                                                    Tanggal
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_detail_riwayat as $key => $item)
                                            <tr>
                                                <td>
                                                    Nama Bank : {{@$item['rekening']['nama_bank']}} <br>
                                                    Nama : {{@$item['rekening']['atas_nama']}} <br>
                                                    No Rekening : {{@$item['rekening']['nomor_rekening']}}
                                                </td>
                                                <td>
                                                    {{App\Http\Controllers\Controller::rupiah(@$item['besar_nominal'])}}
                                                </td>
                                                <td>
                                                    <a href="{{$base_url.@$item['bukti_pembayaran']}}" target="__blank" class="btn btn-primary btn-sm">Lihat</a>
                                                </td>
                                                <td>
                                                    {{@$item['keterangan']}}
                                                </td>
                                                <td>
                                                    {{date('d-m-Y H:i:s',strtotime($item['created_at']))}}
                                                </td>
                                            </tr>
                                            @endforeach
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
                            <div class="table-responsive">

                            <table class="table">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jenis Barang</th>
                                    <th>Nama Vendor</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Harga</th>
                                    {{-- <th>DP</th>
                                    <th>Sisa Hutang</th> --}}
                                    <th>Dibuat Tgl</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                                @foreach ($master_barang_taqsith as $user)
                                <tr>
                                    <td>{{$user['nama_barang']}}</td>
                                    <td>{{$user['master_jenis_barang']['jenis_barang']}}</td>
                                    <td>{{$user['nama_vendor']}}</td>
                                    <td>{{$user['jenis_pembayaran']}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['biaya_perlengkapan'])}}</td>
                                    {{-- <td>{{App\Http\Controllers\Controller::rupiah($user['nominal_dp'])}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['nominal_utang'])}}</td> --}}
                                    <td>{{date('d-m-Y H:i:s',strtotime($user['created_at']))}}</td>
                                    {{-- <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                              <button class="dropdown-item" wire:click="detail('{{\Crypt::encrypt($user)}}')">Lihat</button>
                                              <button class="dropdown-item" wire:click="edit('{{\Crypt::encrypt($user)}}')">Edit</button>

                                              <button class="dropdown-item" wire:click="delete('{{$user['id']}}')" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Hapus</button>
                                            </div>
                                          </div>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </table>
                        </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{$master_barang_taqsith->links()}}

                            </div>
                            <div class="col-md-2">
                                <small>{{$master_barang_taqsith->total()}} Total Items</small>

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
        })
    </script>
    <script>
        window.livewire.on('edit-data-pelunasan', info => {
            $("#full-scrn-pelunasan").modal('show');
        })

    </script>
@endpush
