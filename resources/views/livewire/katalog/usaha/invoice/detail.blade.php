<div>

    <section class="section">
        <div class="row">



            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $inv['invoice'] }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h6>Nama </h6>
                                <p class="text-muted">
                                    {{ $user['name'] }}
                                </p>
                                <h6>Email</h6>
                                <p class="text-muted">
                                    {{ $user['email'] }}

                                </p>
                                <h6>No HP</h6>
                                <p class="text-muted">
                                    {{ $user['phone'] }}

                                </p>
                                <h6>Kode Alfiliasi</h6>
                                <p class="text-muted">
                                    {{ $user['ref'] }}

                                </p>


                            </div>

                            <div class="col-md-4">
                                <h6>Penerima Pengiriman</h6>
                                <p class="text-muted">
                                    {{ $inv['alamat']['nama_penerima'] }}

                                </p>
                                <h6>No HP Penerima</h6>
                                <p class="text-muted">
                                    {{ $inv['alamat']['nomor_hp'] }}

                                </p>
                                <h6>Alamat Pengiriman</h6>
                                <p class="text-muted">
                                    {{ $inv['alamat']['alamat_lengkap'] . ', ' . $inv['alamat']['kecamatan'] . ', ' . $inv['alamat']['kota'] . ', ' . $inv['alamat']['provinsi'] . ', ' . $inv['alamat']['kode_pos'] }}

                                </p>

                                @if ($inv['dikirim'])
                                <h6>Resi</h6>
                                <p class="text-muted">
                                    {{ $inv['resi'] }}

                                </p>
                                @endif


                            </div>

                            <div class="col-md-4">
                                <h6>Total Transaksi</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah($inv['total_transaksi']) }}

                                </p>
                                <h6>Ongkir</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah($inv['ongkir']) }}

                                </p>
                                <h6>Total Transaksi + Ongkir</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah($inv['total_transaksi_ongkir']) }}

                                </p>


                                <h6>Status INV</h6>
                                <p class="text-muted">
                                    {!! $status !!}

                                </p>

                                @if ($inv['dibatalkan'])
                                <h6>Alasan Pembatalan</h6>
                                <p class="text-muted">
                                    {{$inv['alasan_dibatalkan']}}

                                </p>
                                @endif
                            </div>
                        </div>




                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Produk</h4>
                    </div>
                    <div class="card-body">
                        @if ($inv['iak'] == null)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Foto</th>
                                        <th>Catatan</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inv['invoice_detail'] as $item)
                                        <tr>
                                            <td>{{ @$item['produk']['nama_produk'] }}</td>
                                            <td><img src="{{ $base_url . @$item['produk']['foto_utama'] }}"
                                                    alt="" height="200px"></td>
                                            <td>{{ @$item['catatan'] }}</td>
                                            <td>{{ App\Http\Controllers\Controller::rupiah(@$item['produk']['harga']) }}
                                            </td>
                                            <td>{{ @$item['qty'] }}</td>
                                            <td>{{ App\Http\Controllers\Controller::rupiah(@($item['produk']['harga'] * $item['qty'])) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Jumlah</th>
                                        <td>{{ App\Http\Controllers\Controller::rupiah($inv['total_transaksi_ongkir']) }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        @else
                        {{-- {{dd($inv)}} --}}
                            @if (@$inv['iak_json']['code'])
                                <h6>Nama Produk</h6>
                                <p class="text-muted">
                                    {{  @$inv['iak_json']['code'] }}

                                </p>
                                <h6>Nominal</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah( @$inv['iak_json']['nominal'] )}}

                                </p>
                                <h6>Biaya Admin (dari layanan)</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah( @$inv['iak_json']['admin'] )}}

                                </p>
                                <h6>Potongan (dari layanan)</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah( (@$inv['iak_json']['nominal'] + @$inv['iak_json']['admin']) - (@$inv['iak_json']['selling_price']) )}}

                                </p>
                                <h6>Harga Dijual (dari layanan)</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah( @$inv['iak_json']['selling_price'] )}}

                                </p>
                                <h6>Keuntungan PANGANHUB</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah( @$inv['total_transaksi'] - (@$inv['iak_json']['selling_price']) )}}

                                </p>

                                <h6>Total Pembayaran</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah( @$inv['total_transaksi'] )}}

                                </p>

                            @else
                            <h6>Nama Produk</h6>
                                <p class="text-muted">
                                    {{  @$inv['iak_json']['product_code'] }}

                                </p>
                                <h6>Biaya</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah( @$inv['iak_json']['price'] )}}

                                </p>

                                <h6>Keuntungan PANGANHUB</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah( @$inv['total_transaksi'] - (@$inv['iak_json']['price']) )}}

                                </p>

                                <h6>Total Pembayaran</h6>
                                <p class="text-muted">
                                    {{ App\Http\Controllers\Controller::rupiah( @$inv['total_transaksi'] )}}

                                </p>
                            @endif

                        @endif



                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tindakan INV</h4>
                    </div>
                    <div class="card-body">
                        @if ($inv['dibatalkan'] != 1 && $inv['iak'] == null)
                            @switch($status_txt)
                                @case('menunggu_konfirmasi')
                                <button class="btn btn-success" wire:click="setujui('{{$inv['id']}}')" onclick="return confirm('Apakah Anda yakin ingin menyetujui invoice ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Setujui Permintaan Pembelian</button>

                                @break

                                @case('diproses')
                                @case('dikirim')
                                <div class="form-group">

                                  <label for="">Masukkan Resi</label>
                                  <input class="form-control" type="text" wire:model="resi" required>
                                </div>
                                <button class="btn btn-success" wire:click="dikirim('{{$inv['id']}}')" onclick="return confirm('Apakah Anda yakin ingin memproses pengiriman invoice ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Proses Pengiriman</button>
                                @break

                                @default
                                <p>Tidak ada Tindakan untuk Invoice ini</p>
                            @endswitch
                        @else
                        <p>Tidak ada Tindakan untuk Invoice Prabayar dan Pascabayar PPOB</p>

                        @endif


                        @if ($inv['dikirim'] == 0 && $inv['dibatalkan'] == 0  && $inv['iak'] == null)
                            {{-- untuk pembatalan --}}
                            {{-- <p><br></p> --}}
                            <p><br></p>
                            <p>Atau batalkan transaksi ini?</p>
                            <div class="form-group">

                              <label for="">Masukkan Alasan</label>
                              <input class="form-control" type="text" wire:model="alasan_dibatalkan" required>
                            </div>
                            <button class="btn btn-danger" wire:click="batalkan('{{$inv['id']}}')" onclick="return confirm('Apakah Anda yakin ingin membatalkan invoice ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Batalkan Permintaan Pembelian</button>

                        @endif
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
    </script>
@endpush
