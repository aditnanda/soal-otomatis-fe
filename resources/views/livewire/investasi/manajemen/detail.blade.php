<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    {{-- {{json_encode($inv)}} --}}
    <section class="section">
        <div class="row">
            <div class="col-md-12">


                <!-- full size modal-->
                <div class="modal fade text-left w-100" id="full-scrn-beli-slot" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel20" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel20">Beli Slot</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                @livewire('investasi.manajemen.beli-slot')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary btn-sm" data-bs-dismiss="modal">
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
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel20">Perpanjangan Fase</h4>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                @livewire('investasi.manajemen.perpanjangan-fase')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary btn-sm" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-sm-block d-none">Tutup</span>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $inv['nama_investasi'] }} <small>Point : {{ $inv['point'] }} XP</small></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{ $base_url . $inv['foto'] }}" alt="" class="img-fluid">
                                <p><br></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h6>Nama Pihak</h6>
                                <p class="text-muted">
                                    {{ $inv['nama_pihak'] }}
                                </p>
                                <h6>Periode Investasi</h6>
                                <p class="text-muted">
                                    {{ $inv['periode'] }} bulan

                                </p>
                                <h6>Profit bersih untuk anggota</h6>
                                <p class="text-muted">
                                    {{ $inv['profit_bersih_persen'] }}% -
                                    <code>{{ App\Http\Controllers\Controller::rupiah($inv['profit_bersih']) }}</code>
                                </p>
                                <h6>Profit bersih untuk PANGANHUB</h6>
                                <p class="text-muted">
                                    {{ $inv['profit_ksbb_persen'] }}% -
                                    <code>{{ App\Http\Controllers\Controller::rupiah($inv['profit_ksbb']) }}</code>
                                </p>
                            </div>

                            <div class="col-md-4">
                                <h6>Total Investasi</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah($inv['total_investasi']) }}
                                </p>
                                <h6>Total Investasi Asli</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah($inv['total_investasi_real']) }}
                                </p>
                                <h6>Total Jumlah Slot</h6>
                                <p class="text-muted">
                                    {{ $inv['seluruh_slot'] }}
                                </p>
                                <h6>Tanggal jatuh tempo investasi</h6>
                                <p class="text-muted">
                                    {{ $inv['end_pengumpulan_dana'] }}
                                </p>
                                {{-- <h6>Modal perbulan yang harus dibayarkan</h6>
                        <p class="text-muted">
                            {{$inv['nama_pihak']}} membayar <code>{{App\Http\Controllers\Controller::rupiah($inv['total_investasi'] / ($inv['periode'] * 12))}}</code>/ bulan
                        </p> --}}
                            </div>

                            <div class="col-md-4">
                                <h6>Investasi PANGANHUB</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah($inv['total_investasi_real'] - $inv['total_investasi']) }}
                                </p>
                                <h6>Harga per slot</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah($inv['harga_per_slot']) }}

                                </p>
                                <h6>Slot saat ini</h6>
                                <p class="text-muted">
                                    {{ $inv['total_slot'] }}
                                </p>
                                <h6>Maksimum slot yang bisa dibeli</h6>
                                <p class="text-muted">
                                    {{ $inv['max_slot_dibeli'] }}
                                </p>
                            </div>
                        </div>
                        @if (($inv['investasi_fase']['fase_2'] || $inv['investasi_fase']['fase_1']) && $inv['investasi_fase']['fase_3'] == false)
                        <br>
                        <div class="row">
                            <div class="form-group">
                                <label for="">Investasi PANGANHUB</label>
                                <input name="" id="" wire:model='investasi_ksbb' class="form-control" type="number" required/>
                                <button type="button" wire:click='investasiKsbbSet()' class="btn btn-success btn-sm">Simpan</button>

                            </div>

                        </div>
                        @endif

                        <br>
                        <div class="buttons">
                            <a href="{{ $base_url . $inv['pdf'] }}" class="btn btn-primary">Unduh Proposal</a>
                            <a href="#" wire:click="belislot('{{ \Crypt::encrypt($inv) }}')"
                                class="btn btn-secondary">Beli Slot</a>
                            <a href="{{ route('koperasi.topup_tabungan.index') }}" class="btn btn-info">Topup Saldo
                                Tabungan</a>
                            {{-- <a href="#" class="btn btn-warning">Warning</a>
                    <a href="#" class="btn btn-danger">Danger</a>
                    <a href="#" class="btn btn-success">Success</a>
                    <a href="#" class="btn btn-light">Light</a>
                    <a href="#" class="btn btn-dark">Dark</a> --}}
                        </div>
                        <hr>
                        @if ($users_tertutup)
                            <br>
                            <div class="row">
                                <div class="form-group">
                                    <label for="">Member</label>
                                    <select name="" id="" wire:model='user_id' class="form-control">
                                        <option value="">Pilih ...</option>
                                        @foreach ($users as $item)
                                        <option value="{{$item['id']}}">{{$item['name'] .' - '. $item['no_anggota']}}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" wire:click='tambahTertutup()' class="btn btn-success btn-sm">Tambahkan</button>

                                </div>

                            </div>
                            <h6>List Penggguna Tertutup</h6>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No Anggota</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($users_tertutup as $item)
                                            <tr>
                                                <td>{{ $item['name'] }}</td>
                                                <td>{{ $item['email'] }}</td>
                                                <td>{{ $item['no_anggota'] }}</td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm"
                                                            wire:click="hapusTertutup('{{ $item['id'] }}')"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Hapus</button>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <br>
                            <hr>

                        @endif
                        <br>
                        <h6>List Bid Pengguna</h6>
                        <div class="row">

                            <div class="form-group">
                                <label for="">Export Excel</label>
                                {{-- <a href="{{url('manajerial/simpanan_pokok/excel?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir)}}" class="form-control btn btn-success" wire:click='goExcel()'>Excel</a> --}}
                                <button onclick="exportTableToExcel('tblData','{{'list_pengguna_tertutup_'.$inv['nama_pihak']}}')" class="btn btn-success btn-sm" >Excel</button>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="tblData">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>HP</th>
                                        <th>No Anggota</th>
                                        <th>Jumlah Slot</th>
                                        <th>Jumlah Slot Asli</th>
                                        <th>Total Harga</th>
                                        <th>Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                        $total_slot = 0;
                                    @endphp
                                    @foreach ($beli_slot as $item)
                                        @if ($item['status'] == '1')
                                            <tr>
                                                <td>{{ $item['user']['name'] }}</td>
                                                <td>{{ $item['user']['email'] }}</td>
                                                <td>{{ $item['user']['phone'] }}</td>
                                                <td>{{ $item['user']['no_anggota'] }}</td>
                                                <td>{{ $item['jumlah_slot_dibeli'] }}
                                                </td>
                                                <td>{{ $item['jumlah_slot_dibeli_awal'] }}</td>
                                                <td>{{ App\Http\Controllers\Controller::rupiah($item['total_harga_dibeli']) }}
                                                    <td>{{ date('d-m-Y H:i:s',strtotime($item['created_at'])) }}
                                                </td>

                                                <td>
                                                    <button class="btn btn-info btn-sm"
                                                        wire:click="showUser('{{ $item['user_id'] }}')">Lihat Profil
                                                        Pengguna</button>
                                                    @if ($item['status'] == '0')
                                                        <button class="btn btn-success"
                                                            wire:click="setujui('{{ $item['id'] }}')"
                                                            onclick="return confirm('Apakah Anda yakin ingin menyetujui ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Setujui</button>
                                                        <button class="btn btn-danger"
                                                            wire:click="tolak('{{ $item['id'] }}')"
                                                            onclick="return confirm('Apakah Anda yakin ingin menolak ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Tolak</button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php
                                                $total += $item['total_harga_dibeli'];
                                                $total_slot += $item['jumlah_slot_dibeli'];
                                            @endphp
                                        @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total Keseluruhan</th>
                                        <th>{{ $total_slot }}</th>
                                        <th>&nbsp;</th>
                                        <th>{{ App\Http\Controllers\Controller::rupiah($total) }}</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <br>
                        <hr>
                        <h6>Timeline</h6>

                        <ul class="timeline" id="timeline">

                            <li class="li {!! $inv['investasi_fase']['fase_1'] ? 'complete' : '' !!}">
                                <div class="timestamp">
                                    <span class="author">Fase 1</span>
                                </div>
                                <div class="status">
                                    <h4> Fase Draft </h4>
                                </div>
                            </li>
                            <li class="li {!! $inv['investasi_fase']['fase_2'] ? 'complete' : '' !!}">
                                <div class="timestamp">
                                    <span class="author">Fase 2</span>
                                </div>
                                <div class="status">
                                    <h4> Pengumpulan Dana </h4>
                                </div>
                            </li>
                            <li class="li {!! $inv['investasi_fase']['fase_3'] ? 'complete' : '' !!}">
                                <div class="timestamp">
                                    <span class="author">Fase 3</span>
                                </div>
                                <div class="status">
                                    <h4> Dana Terpenuhi </h4>
                                </div>
                            </li>
                            <li class="li {!! $inv['investasi_fase']['fase_4'] ? 'complete' : '' !!}">
                                <div class="timestamp">
                                    <span class="author">Fase 4</span>
                                </div>
                                <div class="status">
                                    <h4> Penyerahan Dana </h4>
                                </div>
                            </li>
                            <li class="li {!! $inv['investasi_fase']['fase_5'] ? 'complete' : '' !!}">
                                <div class="timestamp">
                                    <span class="author">Fase 5</span>
                                </div>
                                <div class="status">
                                    <h4> Angsuran Berjalan </h4>
                                </div>
                            </li>
                            <li class="li {!! $inv['investasi_fase']['fase_6'] ? 'complete' : '' !!}">
                                <div class="timestamp">
                                    <span class="author">Fase 6</span>
                                </div>
                                <div class="status">
                                    <h4> Pembagian Profit </h4>
                                </div>
                            </li>
                        </ul>

                        <hr>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {!! $active_tab == 'fase-1' ? 'active' : '' !!}" id="fase-1" data-bs-toggle="tab"
                                    href="#fase-1" role="tab" aria-controls="fase-1" aria-selected="true"
                                    wire:click="setMenu('fase-1')">Fase 1</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {!! $active_tab == 'fase-2' ? 'active' : '' !!}" id="fase-2" data-bs-toggle="tab"
                                    href="#fase-2" role="tab" aria-controls="fase-2" aria-selected="true"
                                    wire:click="setMenu('fase-2')">Fase 2</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {!! $active_tab == 'fase-3' ? 'active' : '' !!}" id="fase-3" data-bs-toggle="tab"
                                    href="#fase-3" role="tab" aria-controls="fase-3" aria-selected="true"
                                    wire:click="setMenu('fase-3')">Fase 3</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {!! $active_tab == 'fase-4' ? 'active' : '' !!}" id="fase-4" data-bs-toggle="tab"
                                    href="#fase-4" role="tab" aria-controls="fase-4" aria-selected="true"
                                    wire:click="setMenu('fase-4')">Fase 4</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {!! $active_tab == 'fase-5' ? 'active' : '' !!}" id="fase-5" data-bs-toggle="tab"
                                    href="#fase-5" role="tab" aria-controls="fase-5" aria-selected="true"
                                    wire:click="setMenu('fase-5')">Fase 5</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link {!! $active_tab == 'fase-6' ? 'active' : '' !!}" id="fase-6" data-bs-toggle="tab"
                                    href="#fase-6" role="tab" aria-controls="fase-6" aria-selected="true"
                                    wire:click="setMenu('fase-6')">Fase 6</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade {!! $active_tab == 'fase-1' ? 'active show' : '' !!}" id="fase-1" role="tabpanel"
                                aria-labelledby="fase-1-tab">
                                @if ($inv['investasi_fase']['fase_1'])
                                    @if ($active_tab_current == 'fase-1')
                                    @else
                                        <p class="my-2">
                                            Fase ini sudah selesai
                                        </p>
                                    @endif
                                @elseif ($inv['investasi_fase']['fase_1'] == 0)
                                    <p class="my-2">
                                        Fase ini belum terbuka
                                    </p>
                                @else
                                @endif

                            </div>

                            <div class="tab-pane fade {!! $active_tab == 'fase-2' ? 'active show' : '' !!}" id="fase-2" role="tabpanel"
                                aria-labelledby="fase-2-tab">
                                @if ($inv['investasi_fase']['fase_2'])
                                    @if ($active_tab_current == 'fase-2')
                                        <p class="my-2">
                                            Dana tidak terpenuhi dalam rentang waktu pengumpulan dana.
                                        </p>
                                        <button class="btn btn-success"
                                            wire:click="perpanjangan('{{ \Crypt::encrypt($inv) }}')">Perpanjang Fase
                                            Pengumpulan Dana</button>
                                        <button class="btn btn-warning" wire:click="cancel('{{ $inv['id'] }}')"
                                            onclick="return confirm('Apakah Anda yakin ingin membatalkan investasi ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Batalkan
                                            Investasi</button>
                                        <p class="my-2">
                                            <br>
                                            Dana tidak terpenuhi, Klik tombol dibawah untuk dimodali PANGANHUB
                                        </p>
                                        <button class="btn btn-success"
                                            wire:click="dimodalikoperasi('{{ $inv['id'] }}')"
                                            onclick="return confirm('Apakah Anda yakin ingin melanjutkan fase investasi ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Masuk
                                            ke Fase Berikutnya dengan Modal PANGANHUB</button>

                                        <p><br></p>
                                        {{-- ini untuk list bid --}}
                                        <h6>List Bid Pengguna</h6>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>HP</th>
                                                        <th>Jumlah Slot</th>
                                                        <th>Jumlah Slot Asli</th>
                                                        <th>Total Harga</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($beli_slot as $item)
                                                        <tr>
                                                            <td>{{ $item['user']['name'] }}</td>
                                                            <td>{{ $item['user']['email'] }}</td>
                                                            <td>{{ $item['user']['phone'] }}</td>
                                                            <td><input type="number" required
                                                                    value="{{ $item['jumlah_slot_dibeli'] }}"
                                                                    class="form-control"
                                                                    wire:model='jumlah_slot_dibeli.{{ $item['id'] }}'>
                                                            </td>
                                                            <td>{{ $item['jumlah_slot_dibeli_awal'] }}</td>
                                                            <td>{{ App\Http\Controllers\Controller::rupiah($item['total_harga_dibeli']) }}
                                                            </td>
                                                            <td>
                                                                @if ($item['status'] == '1')
                                                                    <span class="badge bg-success">Diterima</span>
                                                                @elseif ($item['status'] == '2')
                                                                    <span class="badge bg-danger">Ditolak</span>
                                                                @else
                                                                    <span class="badge bg-warning">Menunggu</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-info"
                                                                    wire:click="showUser('{{ $item['user_id'] }}')">Lihat
                                                                    Profil Pengguna</button>
                                                                @if ($item['status'] == '0')
                                                                    <button class="btn btn-success"
                                                                        wire:click="setujui('{{ $item['id'] }}')"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menyetujui ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Setujui</button>
                                                                    <button class="btn btn-danger"
                                                                        wire:click="tolak('{{ $item['id'] }}')"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menolak ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Tolak</button>
                                                                @endif
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <p class="my-2">
                                            Fase ini sudah selesai
                                        </p>
                                    @endif
                                @elseif ($inv['investasi_fase']['fase_2'] == 0)
                                    <p class="my-2">
                                        Fase ini belum terbuka
                                    </p>
                                @else
                                @endif
                            </div>

                            <div class="tab-pane fade {!! $active_tab == 'fase-3' ? 'active show' : '' !!}" id="fase-3" role="tabpanel"
                                aria-labelledby="fase-3-tab">
                                @if ($inv['investasi_fase']['fase_3'])
                                    @if ($active_tab_current == 'fase-3')
                                        <p class="my-2">
                                            Dana telah terpenuhi, proses bisa dilanjutkan ke fase berikutnya.
                                        </p>
                                        <button class="btn btn-warning" wire:click="fase3('{{ $inv['id'] }}')"
                                            onclick="return confirm('Apakah Anda yakin ingin melanjutkan fase investasi ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Lanjutkan
                                            ke fase penyerahan dana</button>
                                    @else
                                        <p class="my-2">
                                            Fase ini sudah selesai
                                        </p>
                                    @endif
                                @elseif ($inv['investasi_fase']['fase_3'] == 0)
                                    <p class="my-2">
                                        Fase ini belum terbuka
                                    </p>
                                @else
                                @endif
                            </div>

                            <div class="tab-pane fade {!! $active_tab == 'fase-4' ? 'active show' : '' !!}" id="fase-4" role="tabpanel"
                                aria-labelledby="fase-4-tab">
                                @if ($inv['investasi_fase']['fase_4'])
                                    @if ($active_tab_current == 'fase-4')
                                        <p class="my-2">
                                            Silahkan proses ke fase berikutnya jika penyerahan dana telah selesai.
                                        </p>
                                        <button class="btn btn-warning" wire:click="fase4('{{ $inv['id'] }}')"
                                            onclick="return confirm('Apakah Anda yakin ingin melanjutkan fase investasi ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Proses
                                            ke fase angsuran berjalan</button>

                                        <p><br></p>
                                        {{-- ini untuk list bid --}}
                                        <h6>List Bid Pengguna</h6>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>HP</th>
                                                        <th>Jumlah Slot</th>
                                                        <th>Jumlah Slot Asli</th>
                                                        <th>Total Harga</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($beli_slot as $item)
                                                        <tr>
                                                            <td>{{ $item['user']['name'] }}</td>
                                                            <td>{{ $item['user']['email'] }}</td>
                                                            <td>{{ $item['user']['phone'] }}</td>
                                                            <td><input type="number" required
                                                                    value="{{ $item['jumlah_slot_dibeli'] }}"
                                                                    class="form-control"
                                                                    wire:model='jumlah_slot_dibeli.{{ $item['id'] }}'>
                                                            </td>
                                                            <td>{{ $item['jumlah_slot_dibeli_awal'] }}</td>
                                                            <td>{{ App\Http\Controllers\Controller::rupiah($item['total_harga_dibeli']) }}
                                                            </td>
                                                            <td>
                                                                @if ($item['status'] == '1')
                                                                    <span class="badge bg-success">Diterima</span>
                                                                @elseif ($item['status'] == '2')
                                                                    <span class="badge bg-danger">Ditolak</span>
                                                                @else
                                                                    <span class="badge bg-warning">Menunggu</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-info"
                                                                    wire:click="showUser('{{ $item['user_id'] }}')">Lihat
                                                                    Profil Pengguna</button>
                                                                @if ($item['status'] == '0')

                                                                    <button class="btn btn-danger"
                                                                        wire:click="tolak('{{ $item['id'] }}')"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menolak ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Tolak</button>
                                                                @endif
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <p class="my-2">
                                            Fase ini sudah selesai
                                        </p>
                                    @endif
                                @elseif ($inv['investasi_fase']['fase_4'] == 0)
                                    <p class="my-2">
                                        Fase ini belum terbuka
                                    </p>
                                @else
                                @endif
                            </div>

                            <div class="tab-pane fade {!! $active_tab == 'fase-5' ? 'active show' : '' !!}" id="fase-5" role="tabpanel"
                                aria-labelledby="fase-5-tab">
                                @if ($inv['investasi_fase']['fase_5'])
                                    @if ($active_tab_current == 'fase-5')
                                        <br>
                                        {{-- <h6>Laporan Tambahan</h6>
                            @livewire('investasi.manajemen.laporan.index',['inv' => $inv])

                            <br>
                            <hr> --}}
                                        <h6>Pengembalian Modal</h6>
                                        @livewire('investasi.manajemen.angsuran.index', ['inv' => $inv])
                                        <br>
                                        <hr>
                                        <br>

                                        <div class="buttons">
                                            @if ($inv['investasi_fase']['status_profit'] == 0)
                                                <p class="text-muted">
                                                    Silahkan proses ke profit masuk jika profit sudah diterima dari
                                                    Pemilik Investasi.
                                                </p>
                                                <label for="">Profit Bersih Nominal</label>
                                                <input type="number" name="" id=""
                                                    wire:model='profit_bersih' class="form-control">
                                                <label for="">Laporan</label>
                                                <input type="file" name="" id=""
                                                    wire:model='pdf_profit' class="form-control">
                                                    @if ($pdf_profit)
                                                    <button wire:click="profitMasuk('{{ $inv['id'] }}')"
                                                    class="btn btn-primary" wire:loading>Profit Masuk</button>
                                                    @endif

                                                    {{-- <br>
                                                    <p class="text-muted">
                                                        Atau Jurnal Kas Secara Manual, kemudian selesaikan fase dengan mengklik tombol dibawah ini
                                                    </p>
                                                    <button wire:click="fase6('{{ $inv['id'] }}')"
                                                    class="btn btn-primary">Selesaikan Fase Investasi</button> --}}
                                            @endif
                                            @if ($inv['investasi_fase']['status_profit'] == 1 && $inv['investasi_fase']['status_profit_dibagikan'] == 0)
                                                <p class="text-muted">
                                                    Silahkan proses ke profit dibagikan jika profit masuk telah selesai.
                                                </p>
                                                <button wire:click="profitDibagikan('{{ $inv['id'] }}')"
                                                    class="btn btn-primary">Profit Dibagikan</button>


                                                <hr>
                                                <p class="text-muted">
                                                    Anda dapat menggunakan metode import via excel untuk membagikan
                                                    profit, silahkan mengunjungi menu Topup Tabungan.
                                                </p>
                                                <p class="text-muted">
                                                    Silahkan proses ke fase berikutnya jika pengembalian modal dan
                                                    profit telah selesai.
                                                </p>
                                                <button wire:click="fase6('{{ $inv['id'] }}')"
                                                    class="btn btn-success">Proses ke fase berikutnya</button>
                                            @endif

                                            @if ($inv['investasi_fase']['status_profit'] == 1 && $inv['investasi_fase']['status_profit_dibagikan'] == 1)
                                                <p class="text-muted">
                                                    Silahkan proses ke fase berikutnya jika pengembalian modal dan
                                                    profit telah selesai.
                                                </p>
                                                <button wire:click="fase6('{{ $inv['id'] }}')"
                                                    class="btn btn-success">Proses ke fase berikutnya</button>
                                            @endif
                                            {{-- <a href="#" class="btn btn-warning">Warning</a>
                              <a href="#" class="btn btn-danger">Danger</a>
                              <a href="#" class="btn btn-success">Success</a>
                              <a href="#" class="btn btn-light">Light</a>
                              <a href="#" class="btn btn-dark">Dark</a> --}}
                                        </div>
                                    @else
                                        <p class="my-2">
                                            Fase ini sudah selesai
                                        </p>
                                    @endif
                                @elseif ($inv['investasi_fase']['fase_5'] == 0)
                                    <p class="my-2">
                                        Fase ini belum terbuka
                                    </p>
                                @else
                                @endif
                            </div>

                            <div class="tab-pane fade {!! $active_tab == 'fase-6' ? 'active show' : '' !!}" id="fase-6" role="tabpanel"
                                aria-labelledby="fase-6-tab">
                                @if ($inv['investasi_fase']['fase_6'])
                                    @if ($active_tab_current == 'fase-6')
                                        <p class="my-2">
                                            Proses investasi telah sepenuhnya selesai.
                                        </p>
                                    @else
                                        <p class="my-2">
                                            Fase ini sudah selesai
                                        </p>
                                    @endif
                                @elseif ($inv['investasi_fase']['fase_6'] == 0)
                                    <p class="my-2">
                                        Fase ini belum terbuka
                                    </p>
                                @else
                                @endif
                            </div>

                        </div>


                    </div>
                </div>
            </div>


        </div>

    </section>
</div>
@push('scripts')
    <script>
        window.livewire.on('edit-data-beli-slot', info => {
            $("#full-scrn-beli-slot").modal('show');
        })
    </script>
    <script>
        window.livewire.on('edit-data-perpanjangan', info => {
            $("#full-scrn-perpanjangan").modal('show');
        })

        window.livewire.on('open-new-tab', info => {
            window.open(info, '_blank').focus();

        })
    </script>


<script>
    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename?filename+'.xls':'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob( blob, filename);
        }else{
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>
@endpush
