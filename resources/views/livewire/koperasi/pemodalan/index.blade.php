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
                                @livewire('koperasi.pemodalan.form')
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
                <div class="modal fade text-left w-100" id="full-scrn-detail" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel20" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel20">Detail</h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Nominal</th>
                                            <td>{{App\Http\Controllers\Controller::rupiah(@$taqsith['nominal'])}}</td>
                                        </tr>
                                        <tr>
                                            <th>Cicilan Bulanan</th>
                                            <td>{{@$taqsith['cicilan_bulanan']}}</td>
                                        </tr>
                                        @foreach (@$taqsith ?? [] as $key => $item)
                                        @if (gettype($item) != 'array')
                                        @if (str_contains($key,'modal'))
                                        @if (str_contains($item,'storage'))
                                            <tr>
                                                <th>{{ucwords(str_replace('_',' ',$key))}}</th>

                                                <td>
                                                    <a href="{{$this->base_url}}{{@$item}}" target="__blank"><img src="{{$this->base_url}}{{@$item}}" alt=""  height="500px"></a>

                                                </td>
                                            </tr>
                                        @else
                                        <tr>
                                            <th>{{ucwords(str_replace('_',' ',$key))}}</th>
                                            <td>{{@$item}}</td>
                                        </tr>
                                        @endif

                                        @endif

                                        @endif

                                        @endforeach
                                    </table>
                                </div>
                                @livewire('koperasi.pemodalan.detail')
                                <hr>
                                <h4>Tambah Angsuran</h4>
                                @livewire('koperasi.pemodalan.angsuran')
                                @if (@$taqsith)
                                <h4>List Angsuran</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>Nominal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($taqsith['taqsith_permodalan_angsuran'] as $item)
                                            <tr>
                                                <td>{{$item['id']}}</td>
                                                <td>{{$item['tanggal']}}</td>
                                                <td>{{App\Http\Controllers\Controller::rupiah($item['nominal'])}}</td>

                                                <td>
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()" wire:click="proseshapusangsuran('{{$item['id']}}')">Hapus</button>
                                                </td>
                                            </tr>
                                            @php
                                                $total +=$item['nominal'];
                                            @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2">
                                                    Total
                                                </th>
                                                <td>{{App\Http\Controllers\Controller::rupiah($total)}}</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                @endif

                                <h4>Tambah Bagi Hasil</h4>
                                @livewire('koperasi.pemodalan.bagi-hasil')
                                @if (@$taqsith)
                                <h4>List Bagi Hasil</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tanggal</th>
                                                <th>Nominal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total2 = 0;
                                            @endphp
                                            @foreach ($taqsith['taqsith_permodalan_bagi_hasil'] as $item)
                                            <tr>
                                                <td>{{$item['id']}}</td>
                                                <td>{{$item['tanggal']}}</td>
                                                <td>{{App\Http\Controllers\Controller::rupiah($item['nominal'])}}</td>

                                                <td>
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()" wire:click="proseshapusbagi_hasil('{{$item['id']}}')">Hapus</button>
                                                </td>
                                            </tr>
                                            @php
                                                $total2 +=$item['nominal'];
                                            @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2">
                                                    Total
                                                </th>
                                                <td>{{App\Http\Controllers\Controller::rupiah($total2)}}</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                @endif
                                <h4>Selesaikan Pemodalan</h4>
                                <button class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengubah data ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()" wire:click="prosesselesai('')">Ubah Menjadi Selesai</button>

                                <hr>
                                @if (@$taqsith)
                                @livewire('koperasi.pengguna.pengguna',['user' => @$taqsith['user']])

                                @endif
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
                                    <th>Nama Pengguna</th>
                                    <th>Email Pengguna</th>
                                    <th>No Anggota</th>
                                    <th>Nama Barang</th>
                                    <th>Nominal</th>
                                    <th>Kondisi</th>
                                    <th>DP</th>
                                    <th>Masa Cicilan</th>
                                    <th>Masa Format</th>
                                    <th>Harga Jual</th>
                                    <th>Angsuran</th>
                                    <th>Keuntungan</th>
                                    {{-- <th>Tanggal Pembelian</th>
                                    <th>Tanggal Penyerahan</th>
                                    <th>Modal perusahaan</th>
                                    <th>Modal nama_proyek</th>
                                    <th>Modal mulai</th>
                                    <th>Modal berakhir</th>
                                    <th>Modal keuntungan</th>
                                    <th>Modal jenis_pendanaan</th> --}}
                                    <th>Dibuat Tgl</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($all_taqsith as $user)
                                {{-- {{dd($user)}} --}}
                                <tr>
                                    <td>{{$user['user']['name']}}</td>
                                    <td>{{$user['user']['email']}}</td>
                                    <td>{{@$user['user']['no_anggota']}}</td>
                                    <td>{{$user['nama_barang']}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['nominal'])}}</td>
                                    <td>{{$user['kondisi']}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['dp'])}}</td>
                                    <td>{{$user['cicilan_bulanan']}}</td>
                                    <td>{{$user['format']}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['harga_jual'])}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['angsuran'])}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['keuntungan'])}}</td>
                                    {{-- <td>{{$user['tanggal_pembelian']}}</td>
                                    <td>{{$user['tanggal_penyerahan']}}</td>
                                    <td>{{$user['modal_perusahaan']}}</td>
                                    <td>{{$user['modal_nama_proyek']}}</td>
                                    <td>{{$user['modal_mulai']}}</td>
                                    <td>{{$user['modal_berakhir']}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['modal_keuntungan'])}}</td>
                                    <td>{{$user['modal_jenis_pendanaan']}}</td> --}}
                                    <td>{{date('d-m-Y H:i:s',strtotime($user['created_at']))}}</td>
                                    <td>
                                        {{-- Silahkan membuka aplikasi PANGANHUB Universe sebagai manajer --}}
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                              {{-- <button class="dropdown-item" wire:click="track('{{\Crypt::encrypt($user['user'])}}')">Track Member</button> --}}

                                              {{-- @if ($user['taqsith_member_status']['status_penawaran'] == '1' && $user['taqsith_member_status']['status_penyerahan_barang'] == '0') --}}
                                              <button class="dropdown-item" wire:click="detail('{{\Crypt::encrypt($user)}}')">Detail</button>

                                              {{-- @endif --}}
                                              {{-- <button class="dropdown-item" wire:click="delete('{{$user['id']}}')" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Hapus</button> --}}

                                            </div>
                                          </div>

                                          @if ($user['taqsith_member_status']['status_pengajuan'] == '0')
                                          <div class="form-group">
                                            <br>
                                            Setujui Pemodalan Ini?
                                            <br>
                                            <input type="text" class="form-control" wire:model='alasan.{{$user['id']}}' placeholder="Alasan/Catatan">
                                            <button class="btn btn-sm btn-success" wire:click="pengajuan('1',{{$user['id']}})">Ya</button>
                                            <button class="btn btn-sm btn-danger" wire:click="pengajuan('0',{{$user['id']}})">Tidak</button>
                                          </div>

                                          @endif
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {{$all_taqsith->links()}}

                            </div>
                            <div class="col-md-2">
                                <small>{{$all_taqsith->total()}} Total Items</small>

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
        window.livewire.on('edit-data-pembelian', info => {
            $("#full-scrn-pembelian").modal('show');
        })

    </script>

<script>
    window.livewire.on('edit-data-detail', info => {
        $("#full-scrn-detail").modal('show');
    })
    window.livewire.on('edit-data-detail-hide', info => {
        $("#full-scrn-detail").modal('hide');
    })

    window.livewire.on('reload', info => {
        window.location.reload();
    })

</script>
@endpush
