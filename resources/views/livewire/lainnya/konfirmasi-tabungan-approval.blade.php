<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
        <table class="table dataTable no-footer" id="table1" aria-describedby="table1_info">
            <tr>
                <th>Permintaan dari</th>
                <td>{{$user['user']['name']}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$user['user']['email']}}</td>
            </tr>
            <tr>
                <th>WA</th>
                <td>{{$user['user']['phone']}}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{date('d-m-Y H:i:s',strtotime($user['created_at']))}}</td>
            </tr>

            <tr>
                <th>ID Transaksi</th>
                <td>{{$user['id_transaksi']}}</td>
            </tr>

            <tr>
                <th>Jenis Transaksi</th>
                <td>{{$user['jenis_transaksi']}}</td>
            </tr>

            <tr>
                <th>Nominal</th>
                <td>{{App\Http\Controllers\Controller::rupiah($user['nominal'])}}</td>
            </tr>

            <tr>
                <th>{{str_replace("_"," ",ucfirst('debet_or_kredit'))}}</th>
                <td>{{$user['debet_or_kredit']}}</td>
            </tr>

            <tr>
                <th>{{str_replace("_"," ",ucfirst('saldo_terakhir'))}}</th>
                <td>{{App\Http\Controllers\Controller::rupiah($user['saldo_terakhir'])}}</td>
            </tr>

            <tr>
                <th>{{str_replace("_"," ",ucfirst('keterangan'))}}</th>
                <td>{{$user['keterangan']}}</td>
            </tr>

            <tr>
                <th>{{str_replace("_"," ",ucfirst('jenis_penarikan'))}}</th>
                <td>{{@$user['jenis_penarikan']}}</td>
            </tr>

            @if (@$user['rekening_id'])
            <tr>
                <th>{{str_replace("_"," ",ucfirst('no_rekening_tujuan'))}}</th>
                <td>{{@$user['rekening']['nomor_rekening']}}</td>
            </tr>

            <tr>
                <th>{{str_replace("_"," ",ucfirst('atas_nama'))}}</th>
                <td>{{@$user['rekening']['atas_nama']}}</td>
            </tr>

            <tr>
                <th>{{str_replace("_"," ",ucfirst('nama_bank'))}}</th>
                <td>{{@$user['rekening']['nama_bank']}}</td>
            </tr>
            @endif

            @if (@$user['user_rekenings_id'])
            <tr>
                <th>{{str_replace("_"," ",ucfirst('no_rekening_pengguna'))}}</th>
                <td>{{@$user['user_rekening']['no_rekening']}}</td>
            </tr>

            <tr>
                <th>{{str_replace("_"," ",ucfirst('atas_nama'))}}</th>
                <td>{{@$user['user_rekening']['nama']}}</td>
            </tr>

            <tr>
                <th>{{str_replace("_"," ",ucfirst('nama_bank'))}}</th>
                <td>{{@$user['user_rekening']['bank']['nama_bank']}}</td>
            </tr>
            @endif

            <tr>
                <th>Bukti</th>
                <td><img src="{{$base_url.$user['gambar']}}" alt="" width="320px"></td>
            </tr>


        </table>
        @if (@$user['status_transaksi'] == 0)
        @if (!str_contains($user['keterangan'],'admin'))

        <div class="form-group">
            <label for="">Tanggal</label>
            <input  wire:model='tanggal' type="date" class="form-control">
        </div>
        <button class="btn btn-success" wire:click="goProcess('1')">Setujui</button>
        <button class="btn btn-danger" wire:click="goProcess('2')">Tolak</button>
        @endif

        @endif

    </div>
</div>
