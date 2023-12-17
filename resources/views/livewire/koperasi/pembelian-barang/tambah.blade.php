<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('message_danger'))
            <div class="alert alert-danger">
                {{ session('message_danger') }}
            </div>
        @endif

        @if($updateMode)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Status</th>
                        <td>{{$pembelian_data['status']}}</td>
                    </tr>

                    <tr>
                        <th>Total Pembelian</th>
                        <td>{{App\Http\Controllers\Controller::rupiah($biaya_pembelian)}}</td>
                    </tr>
                </thead>
            </table>
        </div>
        @endif
        <form>
            <div class=" add-input">
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="">ID</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Jenis Barang</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Jumlah Barang</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Nominal</label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="">&nbsp;</label>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <div >
                                <input class="form-control" wire:model="id_barang.0" readonly/>
                            </div>
                            {{-- <input type="text" class="form-control" placeholder="Enter Name" wire:model="master_jenis_barang_id.0"> --}}
                            @error('id_barang.0')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div >
                                <select class="form-control" wire:model="master_jenis_barang_id.0">
                                    <option value="">Pilih Jenis Barang</option>

                                        @foreach ($master_jenis_barang as $m_barang)

                                            <option value="{{ $m_barang['id'] }}">{{ $m_barang['jenis_barang'] }}</option>

                                        @endforeach

                                </select>
                            </div>
                            {{-- <input type="text" class="form-control" placeholder="Enter Name" wire:model="master_jenis_barang_id.0"> --}}
                            @error('master_jenis_barang_id.0')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Deskripsi"
                                wire:model="nama_barang.0">
                            @error('nama_barang.' . 0)
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Jumlah Barang"
                                wire:model="jumlah_barang.0"/>
                            @error('jumlah_barang.' . 0)
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Nominal"
                                wire:model="biaya_perlengkapan.0">
                            @error('biaya_perlengkapan.' . 0)
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            @foreach ($inputs as $key => $value)
                <div class=" add-input">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <div >
                                    <input class="form-control" wire:model="id_barang.{{$value}}" readonly/>
                                </div>
                                {{-- <input type="text" class="form-control" placeholder="Enter Name" wire:model="master_jenis_barang_id.0"> --}}
                                @error('id_barang.'.$value)
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div >
                                    <select class="form-control" wire:model="master_jenis_barang_id.{{$value}}">
                                        <option value="">Pilih Jenis Barang</option>

                                            @foreach ($master_jenis_barang as $m_barang)

                                                <option value="{{ $m_barang['id'] }}">{{ $m_barang['jenis_barang'] }}</option>

                                            @endforeach

                                    </select>
                                </div>
                                {{-- <input type="text" class="form-control" placeholder="Enter Name" wire:model="master_jenis_barang_id.0"> --}}
                                @error('master_jenis_barang_id.'.$value)
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Deskripsi"
                                    wire:model="nama_barang.{{$value}}">
                                @error('nama_barang.' . $value)
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Jumlah Barang"
                                    wire:model="jumlah_barang.{{$value}}"/>
                                @error('jumlah_barang.' . $value)
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Nominal"
                                    wire:model="biaya_perlengkapan.{{$value}}">
                                @error('biaya_perlengkapan.' . $value)
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-danger btn-sm"
                                wire:click.prevent="remove({{ $key }})"> X </button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-6">
                       <button class="btn text-white btn-info btn-sm"
                            wire:click.prevent="add({{ $i }})">Tambah Data</button>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" class="form-control" placeholder="Tanggal"
                                    wire:model="tanggal">
                                @error('tanggal')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Akun Kas</label>
                                <select name="" id="" class="form-control" wire:model='akun_kas'>
                                    <option value="">Pilih ...</option>
                                    @foreach ($kas as $item)
                                        <option value="{{$item['kode_coa']}}">{{$item['nama_coa'].' - '.$item['kode_coa']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Vendor</label>
                                <input type="text" class="form-control" placeholder="Vendor"
                                    wire:model="vendor">
                                @error('vendor')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Lunas/Tempo</label>
                                <select type="text" class="form-control" placeholder="Lunas/Tempo"
                                    wire:model="jenis">
                                    <option value="">Pilih</option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Tempo">Tempo</option>
                                </select>
                                @error('jenis')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                          <button type="button" wire:click.prevent="store()" class="btn btn-success btn-sm">Simpan</button>
                          <button type="button" wire:click.prevent="store('back')" class="btn btn-success btn-sm">Simpan dan Kembali</button>

                        </div>
                      </div>

                </div>
            </div>

        </form>
    </div>
    @if ($updateMode)
    @livewire('koperasi.pembelian-barang-jurnal.index',['pembelian' => $pembelian])

    @endif

</div>

@push('scripts')
{{--
    <script>
        $(document).ready(function () {
            $('#select2').select2();
            $('#select2').on('change', function (e) {
                var data = $('#select2').select2("val");
            // @this.set('selected', data);
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            window.addEventListener('reApplySelect2', event => {
                $('.select2').select2();
            });
        });
    </script> --}}
@endpush
