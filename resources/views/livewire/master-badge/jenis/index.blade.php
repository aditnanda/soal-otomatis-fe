<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <section class="section">
        <div class="row">
            <!-- Button trigger for full size modal -->
            
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
                                    <th>Nama</th>
                                    {{-- <th>Minimal</th>
                                    <th>Maksimal</th>
                                    <th>Point</th> --}}
                                    <th>Dibuat Tgl</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                                @foreach ($rekening as $user)
                                <tr>
                                    <td>{{$user['nama']}}</td>
                                    {{-- <td>{{$user['min']}}</td>
                                    <td>{{$user['max']}}</td>
                                    <td>{{$user['point']}}</td> --}}
                                    
                                    <td>{{date('d-m-Y H:i:s',strtotime($user['created_at']))}}</td>
                                    {{-- <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                              {{-- <button class="dropdown-item" wire:click="edit('{{\Crypt::encrypt($user)}}')">Edit</button> --}}
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
            $(".modal").modal('show');
        })

    </script>
@endpush