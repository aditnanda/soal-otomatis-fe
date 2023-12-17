<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <section class="section">
        <div class="row">
            <!-- Button trigger for full size modal -->
            <div class="col-md-12">


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
                                    <th>Nama Investasi</th>
                                    <th>Nama Pihak</th>
                                    <th>Jumlah Slot Dibeli</th>
                                    <th>Harga Per Slot</th>
                                    <th>Total Harga Slot</th>

                                    {{-- <th>Dibuat Tgl</th> --}}
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($rekening as $user)
                                <tr>
                                    <td>{{$user['investasi']['nama_investasi']}}</td>
                                    <td>{{$user['investasi']['nama_pihak']}}</td>
                                    <td>{{$user['jumlah_slot_dibeli']}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['total_harga_dibeli'] / $user['jumlah_slot_dibeli'])}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['total_harga_dibeli'])}}</td>


                                    {{-- <td>{{date('d-m-Y H:i:s',strtotime($user['created_at']))}}</td> --}}
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                              {{-- <button class="dropdown-item" wire:click="belislot('{{\Crypt::encrypt($user)}}')">Beli Slot</button>
                                              <button class="dropdown-item" wire:click="perpanjangan('{{\Crypt::encrypt($user)}}')">Perpanjang Fase Ini</button> --}}

                                              {{-- <button class="dropdown-item" wire:click="edit('{{\Crypt::encrypt($user)}}')">Edit</button> --}}
                                              <a class="dropdown-item" href="{{route('investasi.investasi_saya.detail',['inv' => $user['investasi']['id']])}}">Detail</a>
                                              {{-- <button class="dropdown-item" wire:click="cancel('{{$user['id']}}')" onclick="return confirm('Apakah Anda yakin ingin membatalkan investasi ini, tindakan ini tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Batalkan Investasi</button> --}}

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
                                {{$rekening->links()}}
                
                            </div>
                            <div class="col-md-2">
                                <small>{{$rekening->total()}} Total Items</small>
                
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

@endpush