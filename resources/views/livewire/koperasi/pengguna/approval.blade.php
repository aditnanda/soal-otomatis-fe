<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
        <table class="table dataTable no-footer" id="table1" aria-describedby="table1_info">
            <tr>
                <th>Nama</th>
                <td>{{$user['name']}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$user['email']}}</td>
            </tr>
            <tr>
                <th>WA</th>
                <td>{{$user['phone']}}</td>
            </tr>
            <tr>
                <th>Tanggal Daftar</th>
                <td>{{date('d-m-Y H:i:s',strtotime($user['created_at']))}}</td>
            </tr>
            <tr>
                <th>Foto KTP</th>
                <td><img src="{{$base_url.$user['regist_verification']['foto_ktp']}}" alt="" width="320px"></td>
            </tr>

            <tr>
                <th>Bukti Transfer</th>
                <td><img src="{{$base_url.$user['regist_verification']['bukti_transfer']}}" alt="" width="320px"></td>
            </tr>

            @if ($user['regist_verification']['token'] != ''  && $user['regist_verification']['bukti_transfer'] != '')
            <tr>
                <th>Pesan Untuk Setuju / Tolak</th>
                <td>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" wire:model="alasan" placeholder="Alasan kamu"></textarea>
                </td>
            </tr>

            <tr>
                <th>Akun Kas</th>
                <td>
                    <select name="" id="" class="form-control" wire:model='akun_kas'>
                        <option value="">Pilih ...</option>
                        @foreach ($kas as $item)
                            <option value="{{$item['kode_coa']}}">{{$item['nama_coa'].' - '.$item['kode_coa']}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Tanggal Jurnal</th>
                <td>
                    <input class="form-control" wire:model="tanggal_jurnal" placeholder="Tanggal Jurnal" type="date"/>
                </td>
            </tr>
            @endif

        </table>
        @if ($user['regist_verification']['token'] == '' && $user['regist_verification']['bukti_transfer'] == '')

        <button class="btn btn-success" wire:click="goProcessAcc('1')">Setujui</button>
        <button class="btn btn-danger" wire:click="goProcessAcc('2')">Tolak</button>
        @endif
        @if ($user['regist_verification']['token'] != '' && $user['regist_verification']['bukti_transfer'] != '')

        <button class="btn btn-success" wire:click="goProcess('Disetujui')">Setujui</button>
        <button class="btn btn-danger" wire:click="goProcess('Ditolak')">Tolak</button>
        @endif

    </div>
</div>
