<div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tabungan dan Histori</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Tabungan Saldo</h6>
                        <p class="text-muted">
                            {{App\Http\Controllers\Controller::rupiah($tabungan['saldo'])}}
                        </p>
                        <div class="table-responsive" >
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
                                    @foreach ($histories as $item)
                                    @php
                                        if ($item['status_transaksi'] == 1) {
                                            # code...
                                            $kode = '<span class="badge bg-success">Sukses</span>';
                                        }else if ($item['status_transaksi'] == 0){
                                            $kode = '<span class="badge bg-warning">Pending</span>';

                                        }else{
                                            $kode = '<span class="badge bg-danger">Gagal</span>';

                                        }
                                    @endphp 
                                    <tr>
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
                                        <td>
                                            {{$item['jenis_transaksi']}}
                                        </td>
                                        <td>
                                            {{App\Http\Controllers\Controller::rupiah($item['nominal'])}}
                                        </td>
                                        <td>
                                            {{$item['debet_or_kredit']}}
                                        </td>
                                        <td>
                                            {{App\Http\Controllers\Controller::rupiah($item['saldo_terakhir'])}}
                                        </td>
                                        <td>
                                            {{$item['keterangan']}}
                                        </td>
                                        <td>
                                            {!!$kode!!}
                                        </td>
                                        <td>
                                            {{$item['id_transaksi']}}
                                        </td>
                                        <td>{{date('d-m-Y H:i:s',strtotime($item['created_at']))}}</td>
                    
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                        <br>
                        <hr>
                        <h6>Rekening Tabungan</h6>
                        <p class="text-muted">
                            Status Tabungan : 
                            @if ($rekening['status'])
                                Sudah divalidasi
                            @else
                                Belum divalidasi
                            @endif
                        </p>
                        @livewire('koperasi.pengguna.tabungan-rekening-form', ['pribadi' => $tabungan])
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('.table-detail').DataTable();
    });
</script>
@endpush