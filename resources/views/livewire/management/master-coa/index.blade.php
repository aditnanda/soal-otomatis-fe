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
                                @livewire('management.master-coa.form')
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
              <div class="table-responsive-lg">
                <table class="table  table-striped">
                  <thead>
                    <tr>
                      <th>Akun COA</th>
                      <th>Kelompok</th>
                      <th>Saldo Normal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  @foreach ($rekening as $item)
                    
                    <thead class="thead-dark">
                      <tr>
                        <th>
                          ({{$item['kode_coa']}}) {{$item['nama_coa']}} 
                        </th>
                        <th>
                          {{$item['kelompok']}}
                        </th>
                        <th>
                          {{$item['saldo_normal']}}
                        </th>
                        <th>
                          <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Aksi
                            </button>
                            <div class="dropdown-menu">
                              <button class="dropdown-item" wire:click="add('{{$item['id']}}','tingkat i','{{\Crypt::encrypt($item)}}')">Tambah</button>
                              <button class="dropdown-item" wire:click="edit('{{$item['id']}}','tingkat i','{{\Crypt::encrypt($item)}}')">Edit</button>
                              <button class="dropdown-item" wire:click="delete('{{$item['id']}}','tingkat i')" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Hapus</button>
                            </div>
                          </div>
                        </th>
                      </tr>
                      
                    </thead>
                    <tbody>
                      @foreach ($item['master_data_coa_tingkat_ii'] as $item2)
                        <tr>
                          <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;({{$item2['kode_coa']}}) {{$item2['nama_coa']}}
                          </td>
                          <td>
                            {{$item2['kelompok']}}
                          </td>
                          <td>
                            {{$item2['saldo_normal']}}
                          </td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Aksi
                              </button>
                              <div class="dropdown-menu">
                                <button class="dropdown-item" wire:click="add('{{$item2['id']}}','tingkat ii','{{\Crypt::encrypt($item2)}}')">Tambah</button>
                      
                                <button class="dropdown-item" wire:click="edit('{{$item2['id']}}','tingkat ii','{{\Crypt::encrypt($item2)}}')">Edit</button>
                                <button class="dropdown-item" wire:click="delete('{{$item2['id']}}','tingkat ii')" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Hapus</button>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @foreach ($item2['master_data_coa_tingkat_iii'] as $item3)
                        <tr>
                          <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;({{$item3['kode_coa']}}) {{$item3['nama_coa']}}
                          </td>
                          <td>
                            {{$item3['kelompok']}}
                          </td>
                          <td>
                            {{$item3['saldo_normal']}}
                          </td>
                          <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Aksi
                              </button>
                              <div class="dropdown-menu">
                                <button class="dropdown-item" wire:click="add('{{$item3['id']}}','tingkat iii','{{\Crypt::encrypt($item3)}}')">Tambah</button>
                                <button class="dropdown-item" wire:click="edit('{{$item3['id']}}','tingkat iii','{{\Crypt::encrypt($item3)}}')">Edit</button>
                                <button class="dropdown-item" wire:click="delete('{{$item3['id']}}','tingkat iii')" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Hapus</button>
                              </div>
                            </div>
                          </td>
                        </tr>
                          @foreach ($item3['master_data_coa_tingkat_iv'] as $item4)
                            <tr>
                              <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;({{$item4['kode_coa']}}) {{$item4['nama_coa']}}
                              </td>
                              <td>
                                {{$item4['kelompok']}}
                              </td>
                              <td>
                                {{$item4['saldo_normal']}}
                              </td>
                              <td>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Aksi
                                  </button>
                                  <div class="dropdown-menu">
                                    <button class="dropdown-item" wire:click="add('{{$item4['id']}}','tingkat iv','{{\Crypt::encrypt($item4)}}')">Tambah</button>
                                    <button class="dropdown-item" wire:click="edit('{{$item4['id']}}','tingkat iv','{{\Crypt::encrypt($item4)}}')">Edit</button>
                                    @if ($item4['bisa_dihapus'] == 1)
                                    <button class="dropdown-item" wire:click="delete('{{$item4['id']}}','tingkat iv')" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini, tindakan ini menghapus data dan tidak dapat DIBATALKAN?') || event.stopImmediatePropagation()">Hapus</button>
  
                                    @endif
                                  </div>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                        @endforeach
                      @endforeach
                    </tbody>
                    @endforeach

                  </table>
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