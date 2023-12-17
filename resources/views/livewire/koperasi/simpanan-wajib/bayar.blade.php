<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tabungan</h4>
            {{-- <div class="row">
                <button class="btn btn-secondary btn-sm text-right" wire:click="detailTabungan('{{\Crypt::encrypt($user)}}')">Lihat Riwayat</button>

            </div> --}}
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

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Bayar</h4>
            {{-- <div class="row">
                <button class="btn btn-secondary btn-sm text-right" wire:click="detailTabungan('{{\Crypt::encrypt($user)}}')">Lihat Riwayat</button>

            </div> --}}
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Periode Awal</label>
                        <input type="text" class="form-control" wire:model='periode_awal' min="{{$min_month}}" readonly/>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Periode Akhir</label>
                        <input type="month" class="form-control" wire:model='periode_akhir' min="{{$min_month}}"/>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">&nbsp;</label>
                        <button class="btn btn-success form-control" wire:click='goBayar()'>Bayar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
