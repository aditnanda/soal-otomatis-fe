<div>
    {{-- Be like water. --}}
    @livewire('lainnya.master-tabungan-form')

    <div class="table-responsive">
        <table id="data_users_reguler" class="display" style="width:100%" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Master Tabungan</th>
                </tr>
            </thead>
            <tbody>
                @foreach (@$result['data']['master_tabungan'] as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                        <td>{{ $item['nama_master_tabungan'] }}</td>
                        
                    </tr>
                @endforeach
                
        </table>
    </div>
</div>

@push('scripts')
    <script>
    $(document).ready(function() {
    $('#data_users_reguler').DataTable();
} );
    </script>
@endpush