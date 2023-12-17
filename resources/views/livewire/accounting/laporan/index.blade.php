<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <section class="section">
        <div class="row">
            <!-- Button trigger for full size modal -->
            <div class="col-md-12">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Tanggal Awal</label>
                        <input name="" id="" class="form-control" wire:model="tgl_awal" type="date"/>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Tanggal Akhir</label>
                        <input name="" id="" class="form-control" wire:model="tgl_akhir" type="date"/>

                    </div>
                </div>

                <p>Lihat Data Laporan Akun</p>
                <div class="col-md-4">
                    <button type="button" class="btn btn-info" wire:click="goCetak('akun')">
                        Lihat Data Laporan Akun
                    </button>
                </div>

                <p>Cetak Data Laporan Pendamping Berdasarkan Periode {{$tgl_awal.' - '.$tgl_akhir}}</p>
                <div class="col-md-4">
                    <button type="button" class="btn btn-info" wire:click="goCetak('buku-besar')">
                        Cetak Data Laporan Pendamping
                    </button>
                </div>

                <p>Cetak Data Laporan SHU Berdasarkan Periode {{$tgl_awal.' - '.$tgl_akhir}}</p>
                <div class="row">
                    <div class="col-md-3">
                        <button type="button" class="btn btn-info" wire:click="goCetak('shu')">
                            Cetak Data Laporan SHU
                        </button>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-success" wire:click="goExcel('shu')">
                            Excel Data Laporan SHU
                        </button>
                    </div>
                </div>

                <hr>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Tanggal Awal</label>
                        <input name="" id="" class="form-control" wire:model="tgl_awal2" type="date"/>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Tanggal Akhir</label>
                        <input name="" id="" class="form-control" wire:model="tgl_akhir2" type="date"/>

                    </div>
                </div>
                <p>Cetak Data Laporan Posisi Keuangan Berdasarkan Periode {{$tgl_awal2.' - '.$tgl_akhir2}}</p>
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-info" wire:click="goCetak('posisi-keuangan')">
                            Cetak Data Laporan Posisi Keuangan
                        </button>
                    </div>
                    {{-- <div class="col-md-4">
                        <button type="button" class="btn btn-success" wire:click="goExcel('posisi-keuangan')">
                            Excel Data Laporan Posisi Keuangan
                        </button>
                    </div> --}}
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
        window.livewire.on('show-data', info => {
            $("#full-scrn-detail").modal('show');
        })

        window.livewire.on('visit', info => {
            window.open(info);
        })
    </script>
@endpush
