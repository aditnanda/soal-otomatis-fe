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

        <form>
            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" class="form-control" placeholder="Tanggal"
                wire:model="tanggal">
            </div>
            <div class=" add-input">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Akun</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">D / K</label>
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
                            <input type="text" class="form-control" placeholder="ID"
                                wire:model="id_j.0" readonly>
                            @error('id_j.' . 0)
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div >
                                <select class="form-control" wire:model="kode_akun.0">
                                    <option value="">Pilih Akun</option>
                                    @foreach($akun as $t1)
                                        <optgroup label="({{ $t1['kode_coa'] }}) {{ $t1['nama_coa'] }}">
                                            @foreach ($t1['master_data_coa_tingkat_ii'] as $t2)
                                                <optgroup label="({{ $t2['kode_coa'] }}) {{ $t2['nama_coa'] }}">
                                                    @foreach ($t2['master_data_coa_tingkat_iii'] as $t3)
                                                        <optgroup label="({{ $t3['kode_coa'] }}) {{ $t3['nama_coa'] }}">
                                                            @foreach ($t3['master_data_coa_tingkat_iv'] as $t4)

                                                                <option value="{{ $t4['kode_coa'] }}">({{ $t4['kode_coa'] }}) {{ $t4['nama_coa'] }}</option>

                                                            @endforeach
                                                        </optgroup>

                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <input type="text" class="form-control" placeholder="Enter Name" wire:model="kode_akun.0"> --}}
                            @error('kode_akun.0')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Deskripsi"
                                wire:model="deskripsi.0">
                            @error('deskripsi.' . 0)
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select type="text" class="form-control" placeholder="Debet / Kredit"
                                wire:model="d_k.0">
                                <option value="">Pilih Debet/Kredit</option>
                                <option value="debet">Debet</option>
                                <option value="kredit">Kredit</option>
                            </select>
                            @error('d_k.' . 0)
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Nominal"
                                wire:model="nominal.0">
                            @error('nominal.' . 0)
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($inputs as $key => $value)
                <div class=" add-input">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="ID"
                                    wire:model="id_j.{{$value}}" readonly>
                                @error('id_j.' . $value)
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div >
                                    <select class="form-control" wire:model="kode_akun.{{$value}}">
                                        <option value="">Pilih Akun</option>
                                        @foreach($akun as $t1)
                                            <optgroup label="({{ $t1['kode_coa'] }}) {{ $t1['nama_coa'] }}">
                                                @foreach ($t1['master_data_coa_tingkat_ii'] as $t2)
                                                    <optgroup label="({{ $t2['kode_coa'] }}) {{ $t2['nama_coa'] }}">
                                                        @foreach ($t2['master_data_coa_tingkat_iii'] as $t3)
                                                            <optgroup label="({{ $t3['kode_coa'] }}) {{ $t3['nama_coa'] }}">
                                                                @foreach ($t3['master_data_coa_tingkat_iv'] as $t4)

                                                                    <option value="{{ $t4['kode_coa'] }}">({{ $t4['kode_coa'] }}) {{ $t4['nama_coa'] }}</option>

                                                                @endforeach
                                                            </optgroup>

                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <input type="text" class="form-control" placeholder="Enter Name" wire:model="kode_akun.0"> --}}
                                @error('kode_akun.'.$value)
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Deskripsi"
                                    wire:model="deskripsi.{{$value}}">
                                @error('deskripsi.' . $value)
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select type="text" class="form-control" placeholder="Debet / Kredit"
                                    wire:model="d_k.{{$value}}">
                                    <option value="">Pilih Debet/Kredit</option>
                                    <option value="debet">Debet</option>
                                    <option value="kredit">Kredit</option>
                                </select>
                                @error('d_k.' . $value)
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Nominal"
                                    wire:model="nominal.{{$value}}">
                                @error('nominal.' . $value)
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
                          <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                    <td style="text-align: right">
                                        Debet
                                    </td>
                                    <td style="text-align: right">
                                        Kredit
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Total
                                    </td>
                                    <td style="text-align: right">
                                        {{App\Http\Controllers\Controller::rupiah2($t_debet)}}
                                    </td>
                                    <td style="text-align: right">
                                        {{App\Http\Controllers\Controller::rupiah2($t_kredit)}}

                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p style="color: red">Perbedaan</p>
                                    </td>
                                    <td colspan="2" style="text-align: right">
                                        {{App\Http\Controllers\Controller::rupiah2($t_beda)}}
                                    </td>

                                </tr>
                            </table>
                          </div>
                          <button type="button" wire:click.prevent="store()" class="btn btn-success btn-sm">Simpan</button>
                          <button type="button" wire:click.prevent="store('back')" class="btn btn-success btn-sm">Simpan dan Kembali</button>

                        </div>
                      </div>

                </div>
            </div>
        </form>
    </div>
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
