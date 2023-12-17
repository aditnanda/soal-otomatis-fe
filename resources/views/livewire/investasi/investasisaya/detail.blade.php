<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
   {{-- {{json_encode($inv)}} --}}
        <section class="section">
          <div class="row">


            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>{{$inv['nama_investasi']}}</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                        <h6>Nama Pihak</h6>
                        <p class="text-muted">
                          {{$inv['nama_pihak']}}
                        </p>
                        <h6>Periode Investasi</h6>
                        <p class="text-muted">
                          {{$inv['periode']}} bulan

                        </p>
                        <h6>Profit bersih untuk anggota</h6>
                        <p class="text-muted">
                        {{$inv['profit_bersih_persen']}}% - <code>{{App\Http\Controllers\Controller::rupiah($inv['profit_bersih'])}}</code>
                        </p>
                        <h6>Profit bersih untuk PANGANHUB</h6>
                        <p class="text-muted">
                            {{$inv['profit_ksbb_persen']}}% - <code>{{App\Http\Controllers\Controller::rupiah($inv['profit_ksbb'])}}</code>
                        </p>
                    </div>

                    <div class="col-md-4">
                        <h6>Total Investasi</h6>
                        <p class="text-muted">
                            {{App\Http\Controllers\Controller::rupiah($inv['total_investasi'])}}
                        </p>
                        <h6>Total Jumlah Slot</h6>
                        <p class="text-muted">
                        {{$inv['seluruh_slot']}}
                        </p>
                        <h6>Tanggal jatuh tempo investasi</h6>
                        <p class="text-muted">
                        {{$inv['end_pengumpulan_dana']}}
                        </p>
                        {{-- <h6>Modal perbulan yang harus dibayarkan</h6>
                        <p class="text-muted">
                            {{$inv['nama_pihak']}} membayar <code>{{App\Http\Controllers\Controller::rupiah($inv['total_investasi'] / ($inv['periode'] * 12))}}</code>/ bulan
                        </p> --}}
                    </div>

                    <div class="col-md-4">
                        <h6>Harga per slot</h6>
                        <p class="text-muted">
                            {{App\Http\Controllers\Controller::rupiah($inv['harga_per_slot'])}}

                        </p>
                        <h6>Slot saat ini</h6>
                        <p class="text-muted">
                        {{$inv['total_slot']}}
                        </p>
                        <h6>Maksimum slot yang bisa dibeli</h6>
                        <p class="text-muted">
                            {{$inv['max_slot_dibeli']}}
                        </p>
                    </div>
                  </div>
                  <br>
                  <div class="buttons">
                    <a href="{{$base_url.$inv['pdf']}}" class="btn btn-primary">Unduh Proposal</a>
                    <a href="{{route('koperasi.topup_tabungan.index')}}" class="btn btn-info">Topup Saldo Tabungan</a>
                    {{-- <a href="#" class="btn btn-warning">Warning</a>
                    <a href="#" class="btn btn-danger">Danger</a>
                    <a href="#" class="btn btn-success">Success</a>
                    <a href="#" class="btn btn-light">Light</a>
                    <a href="#" class="btn btn-dark">Dark</a> --}}
                  </div>
                  <br>
                  <hr>
                  <h6>Timeline</h6>

                  <ul class="timeline" id="timeline">

                    <li class="li {!!($inv['investasi_fase']['fase_1']) ? 'complete' : '' !!}">
                        <div class="timestamp">
                          <span class="author">Fase 1</span>
                        </div>
                        <div class="status">
                          <h4> Fase Draft </h4>
                        </div>
                      </li>
                      <li class="li {!!($inv['investasi_fase']['fase_2']) ? 'complete' : '' !!}">
                        <div class="timestamp">
                          <span class="author">Fase 2</span>
                        </div>
                        <div class="status">
                          <h4> Pengumpulan Dana </h4>
                        </div>
                      </li>
                      <li class="li {!!($inv['investasi_fase']['fase_3']) ? 'complete' : '' !!}">
                        <div class="timestamp">
                          <span class="author">Fase 3</span>
                        </div>
                        <div class="status">
                          <h4> Dana Terpenuhi </h4>
                        </div>
                      </li>
                      <li class="li {!!($inv['investasi_fase']['fase_4']) ? 'complete' : '' !!}">
                        <div class="timestamp">
                          <span class="author">Fase 4</span>
                        </div>
                        <div class="status">
                          <h4> Penyerahan Dana </h4>
                        </div>
                      </li>
                      <li class="li {!!($inv['investasi_fase']['fase_5']) ? 'complete' : '' !!}">
                        <div class="timestamp">
                          <span class="author">Fase 5</span>
                        </div>
                        <div class="status">
                          <h4> Angsuran Berjalan </h4>
                        </div>
                      </li>
                      <li class="li {!!($inv['investasi_fase']['fase_6']) ? 'complete' : '' !!}">
                        <div class="timestamp">
                          <span class="author">Fase 6</span>
                        </div>
                        <div class="status">
                          <h4> Pembagian Profit </h4>
                        </div>
                      </li>
                   </ul>

                  <hr>
                  <br>
                  {{-- <h6>Laporan Tambahan</h6>
                  @livewire('investasi.investasisaya.laporan.index',['inv' => $inv])

                  <br>
                  <hr> --}}
                  <h6>Pengembalian Modal</h6>
                  @livewire('investasi.investasisaya.angsuran.index',['inv' => $inv])
                </div>
              </div>
            </div>


          </div>

        </section>
</div>
@push('scripts')
<script>
    window.livewire.on('edit-data-beli-slot', info => {
        $("#full-scrn-beli-slot").modal('show');
    })

</script>
<script>
    window.livewire.on('edit-data-perpanjangan', info => {
        $("#full-scrn-perpanjangan").modal('show');
    })

</script>
@endpush
