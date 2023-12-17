<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <section class="section">
        <div class="row">
            <!-- Button trigger for full size modal -->

            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Tanggal Awal</label>
                    <input name="" id="" class="form-control" wire:model="tgl_awal" type="date" wire:change='goRefresh()'/>

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Tanggal Akhir</label>
                    <input name="" id="" class="form-control" wire:model="tgl_akhir" type="date" wire:change='goRefresh()'/>

                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Excel</label>
                    {{-- <a href="{{url('manajerial/simpanan_pokok/excel?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir)}}" class="form-control btn btn-success" wire:click='goExcel()'>Excel</a> --}}
                    <button onclick="exportTableToExcel('tblData','{{'simpanan_wajib_'.$tgl_awal.'_'.$tgl_akhir}}')" class="form-control btn btn-success" >Excel</button>

                </div>
            </div>

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

                            <table class="table" id="tblData">
                                <tr>
                                    <th>No Anggota</th>
                                    <th>Nama Anggota</th>
                                    <th>Total Simpanan Wajib</th>
                                    <th>Bulan Terakhir Bayar</th>
                                </tr>
                                @php
                                    $tot = 0;
                                @endphp
                                @foreach ($rekening as $user)
                                @php
                                    $saldo = 0;
                                @endphp
                                @foreach ($user['simpanan_wajib_member']['histori'] as $item)
                                    @php
                                        $saldo += $item['nominal'];
                                    @endphp
                                @endforeach
                                <tr>
                                    <td>{{$user['no_anggota']}}</td>
                                    <td>{{$user['name']}}</td>
                                    <td>{{ App\Http\Controllers\Controller::rupiah($saldo)}}</td>
                                    <td>{{$user['simpanan_wajib_member']['bulan_terakhir']}}</td>


                                </tr>
                                @php
                                    $tot += $saldo;
                                @endphp
                                @endforeach
                                <tr>
                                    <th colspan="2">Total</th>
                                    <td>{{ App\Http\Controllers\Controller::rupiah(@$tot)}}</td>
                                    <th>&nbsp;</th>
                                </tr>
                            </table>
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


<script>
    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename?filename+'.xls':'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob( blob, filename);
        }else{
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>
@endpush
