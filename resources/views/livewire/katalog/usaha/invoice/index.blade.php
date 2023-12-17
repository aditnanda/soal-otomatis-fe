<?php
function getStatus($data){
    if ($data['dibatalkan']) {
        # code...
        return '<span class="badge bg-danger">Dibatalkan</span>';
    }

    if ($data['selesai']) {
        # code...
        return '<span class="badge bg-success">Selesai</span>';
    }

    if ($data['dikirim']) {
        # code...
        return '<span class="badge bg-info">Dikirim</span>';
    }

    if ($data['diproses']) {
        # code...
        return '<span class="badge bg-info">Diproses</span>';
    }

    if ($data['menunggu_konfirmasi']) {
        # code...
        return '<span class="badge bg-warning">Menunggu Konfirmasi</span>';
    }
}
?>
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
                                    <th>Invoice</th>
                                    <th>Total Transaksi</th>
                                    <th>Ongkir</th>
                                    <th>Total Transaksi Ongkir</th>
                                    <th>Status Transaksi</th>

                                    <th>Tanggal Transaksi</th>

                                    <th>Aksi</th>
                                </tr>
                                @foreach ($rekening as $user)
                                <tr>
                                    <td>{{$user['invoice']}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['total_transaksi'])}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['ongkir'])}}</td>
                                    <td>{{App\Http\Controllers\Controller::rupiah($user['total_transaksi_ongkir'])}}</td>

                                    <td>{!! getStatus($user); !!}</td>
                                    <td>{{date('d-m-Y H:i:s',strtotime($user['created_at']))}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                              <button class="dropdown-item" wire:click="detail('{{\Crypt::encrypt($user['id'])}}')">Detail</button>
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