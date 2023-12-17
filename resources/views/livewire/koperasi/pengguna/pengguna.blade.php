<div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail data Pengguna : {{ $user['name'] }}</h4>
            </div>

            <div class="card-body">
                <div class="form-group">

                    <label for="">Role</label>

                    <select name="" id="" wire:model="role" class="form-control" disabled>
                        <option value="Member">Member</option>
                        <option value="Manager">Manager</option>
                        <option value="Direktur">Direktur</option>
                        <option value="Admin">Admin</option>
                    </select>

                </div>

                <div class="form-group">

                    <label for="">Email</label>


                    <input type="email" wire:model='email' class="form-control">
                </div>
                <div class="form-group">

                    <button class="btn btn-success" wire:click="changeRole">Ubah</button>
                </div>
            </div>
        </div>
    </section>

    @if (@$user['regist_verification'])
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Permintaan Menjadi Anggota</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            @foreach ($user['regist_verification'] as $key => $item)
                                @if (str_contains($item, 'storage'))
                                    <tr>

                                        <th>{{ ucfirst(str_replace('_', ' ', $key)) }}</th>

                                        <td><img src="{{ $base_url . '/' . $item }}" alt="" srcset=""
                                                height="240px"></td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (@$pribadi['meta']['status'])
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pribadi</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            @foreach ($pribadi['data']['user_data'] as $key => $item)
                                <tr>
                                    <th>{{ ucfirst(str_replace('_', ' ', $key)) }}</th>
                                    @if (str_contains($item, 'storage'))
                                        <td><img src="{{ $base_url . '/' . $item }}" alt="" srcset=""
                                                height="240px"></td>
                                    @else
                                        <td>{{ $item }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if (@$pekerjaan['meta']['status'])
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Pekerjaan</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            @foreach ($pekerjaan['data']['user_data'] as $key => $item)
                                <tr>
                                    <th>{{ ucfirst(str_replace('_', ' ', $key)) }}</th>
                                    @if (str_contains($item, 'storage'))
                                        <td><img src="{{ $base_url . '/' . $item }}" alt="" srcset=""
                                                height="240px"></td>
                                    @else
                                        <td>{{ $item }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (@$penghasilan['meta']['status'])
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Penghasilan</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            @foreach ($penghasilan['data']['user_data'] as $key => $item)
                                <tr>
                                    <th>{{ ucfirst(str_replace('_', ' ', $key)) }}</th>
                                    @if (str_contains($item, 'storage'))
                                        <td><img src="{{ $base_url . '/' . $item }}" alt="" srcset=""
                                                height="240px"></td>
                                    @else
                                        <td>{{ $item }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($tanggungan['meta']['status'])
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Tanggungan</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            @foreach ($tanggungan['data']['user_data'] as $key => $item)
                                <tr>
                                    <th>{{ ucfirst(str_replace('_', ' ', $key)) }}</th>
                                    @if (str_contains($item, 'storage'))
                                        <td><img src="{{ $base_url . '/' . $item }}" alt="" srcset=""
                                                height="240px"></td>
                                    @else
                                        <td>{{ $item }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (@$keluarga['meta']['status'])
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Keluarga</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            @foreach ($keluarga['data']['user_data'] as $key => $item)
                                <tr>
                                    <th>{{ ucfirst(str_replace('_', ' ', $key)) }}</th>
                                    @if (str_contains($item, 'storage'))
                                        <td><img src="{{ $base_url . '/' . $item }}" alt="" srcset=""
                                                height="240px"></td>
                                    @else
                                        <td>{{ $item }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($ahliwaris['meta']['status'])
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Ahliwaris</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            @foreach ($ahliwaris['data']['user_data'] as $key => $item)
                                <tr>
                                    <th>{{ ucfirst(str_replace('_', ' ', $key)) }}</th>
                                    @if (str_contains($item, 'storage'))
                                        <td><img src="{{ $base_url . '/' . $item }}" alt="" srcset=""
                                                height="240px"></td>
                                    @else
                                        <td>{{ $item }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($rekening['meta']['status'])
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Rekening</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            @foreach ($rekening['data']['user_data'] as $key => $item)
                                <tr>
                                    <th>{{ ucfirst(str_replace('_', ' ', $key)) }}</th>
                                    @if (str_contains($item, 'storage'))
                                        <td><img src="{{ $base_url . '/' . $item }}" alt="" srcset=""
                                                height="240px"></td>
                                    @else
                                        <td>{{ $item }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (@$badge['meta']['status'])
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Badge</h4>
                </div>

                <div class="card-body">
                    <h6>Total Poin</h6>
                    <p>{{ @$badge['data']['user']['badge']['point'] }}</p>

                    <h6>Level</h6>
                    <p>{{ @$badge['data']['user']['badge']['level'] }}</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Poin yang didapat</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$badge['data']['user']['badge']['badge_histori'] ?? [] as $item)
                                    <tr>
                                        <td>{{ @$item['point_yang_didapatkan'] }}</td>
                                        <td>{{ @$item['keterangan'] }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if ($simpanan_wajib['meta']['status'])
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Simpanan Wajib</h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Periode</th>
                                    <th>Nominal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$simpanan_wajib['data']['simpanan_wajib'] as $item)
                                    @php
                                        if ($item['status'] == 1) {
                                            # code...
                                            $kode = '<span class="badge bg-success">Sukses</span>';
                                        } else {
                                            $kode = '<span class="badge bg-danger">Belum Dibayar</span>';
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ @$item['periode'] }}</td>
                                        <td>{{ App\Http\Controllers\Controller::rupiah(@$item['nominal']) }}</td>
                                        <td>{!! $kode !!}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if ($taqsith['meta']['status'])
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Taqsith</h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$taqsith['data']['all_taqsith'] as $item)
                                    <tr>
                                        <td>{{ @$item['created_at'] }}</td>
                                        <td>{{ @$item['nama_barang'] }}</td>
                                        <td>{{ @$item['status'] }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($tabungan['meta']['status'])
        <section class="section">
            <!-- full size modal-->
            <div class="modal fade text-left w-100" id="full-scrn-detail" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel20" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel20">Detail Data</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                            <div class="table-responsive">
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
                            <button type="button" class="btn btn-light-secondary btn-sm" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-sm-block d-none">Tutup</span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tabungan</h4>
                    <div class="row">
                        <button class="btn btn-secondary btn-sm text-right" wire:click="detailTabungan('{{\Crypt::encrypt($user)}}')">Lihat Riwayat</button>

                    </div>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Tabungan</th>
                                    <th>Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (@$tabungan['data']['tabungan'] as $item)
                                    <tr>
                                        <td>{{ @$item['nama_tabungan'] }}</td>
                                        <td>{{ App\Http\Controllers\Controller::rupiah(@$item['saldo']) }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="section">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Keluar Dari Anggota</h4>

            </div>

            <div class="card-body">

                <p>Klik Cek dahulu untuk memastikan Anggota ini tidak ada tanggungan saat proses keluar dari PANGANHUB</p>
                <p>Jika tidak ada tanggungan lanjut ke tombol "Proses Keluar"</p>
                <div class="form-group">
                    <label for="">Tanggal Keluar</label>
                    <input type="date" class="form-control" wire:model='tanggal'/>
                </div>
                    <button class="btn btn-secondary btn-sm" wire:click="keluar('{{$user['id']}}')">Cek Status</button>
                    <button class="btn btn-primary btn-sm" wire:click="goKeluar('{{$user['id']}}')" onclick="return confirm('Apakah Anda yakin ingin melanjutkan proses anggota keluar ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Proses Keluar</button>

            </div>
        </div>
    </section>
</div>
@push('scripts')
    <script>

        window.livewire.on('show-data', info => {
            $("#full-scrn-detail").modal('show');
            document.getElementById("cust-tbody").innerHTML = '';

            // get the current table body html as a string, and append the new row
            var html = document.getElementById("cust-tbody").innerHTML + info;

            // set the table body to the new html code
            document.getElementById("cust-tbody").innerHTML = html;
        })

    </script>

@endpush
