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
                                @livewire('katalog.usaha.produk.form')
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
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Kondisi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Lokasi</th>
                                    <th>Deskripsi</th>
                                    <th>Foto Utama</th>
                                    <th>Foto 2</th>
                                    <th>Foto 3</th>
                                    <th>Foto 4</th>
                                    <th>Foto 5</th>
                                    <th>Dibuat Tgl</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($rekening as $user)
                                <tr>
                                    <td>{{$user['nama_produk']}}</td>
                                    <td>{{$user['kategori']['kategori']}}</td>
                                    <td>{{$user['kondisi']}}</td>
                                    <td>{{$user['harga']}}</td>
                                    <td>{{$user['stok']}}</td>
                                    <td>{{$user['lokasi']}}</td>
                                    <td>{{$user['deskripsi']}}</td>
                                    <td><img src="{{$base_url.$user['foto_utama']}}" alt="" srcset="" class="img-fluid"></td>
                                    <td><img src="{{$base_url.$user['foto_2']}}" alt="" srcset="" class="img-fluid"></td>
                                    <td><img src="{{$base_url.$user['foto_3']}}" alt="" srcset="" class="img-fluid"></td>
                                    <td><img src="{{$base_url.$user['foto_4']}}" alt="" srcset="" class="img-fluid"></td>
                                    <td><img src="{{$base_url.$user['foto_5']}}" alt="" srcset="" class="img-fluid"></td>
                                    
                                    
                                    <td>{{date('d-m-Y H:i:s',strtotime($user['created_at']))}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                              <button class="dropdown-item" wire:click="edit('{{\Crypt::encrypt($user)}}')">Edit</button>
                                              <button class="dropdown-item" wire:click="delete('{{$user['id']}}')" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Hapus</button>
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