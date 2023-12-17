<div>
    {{-- The Master doesn't talk, he acts. --}}
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
                    <td><button class="btn btn-success btn-sm" wire:click="goPilih('{{json_encode($user)}}')">Pilih</button></td>
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
    <br>
    @livewire('koperasi.simpanan-wajib.form')

</div>
