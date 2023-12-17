<x-app-layout>
    @section('Manajemen')
        active
    @endsection

    @section('Learning')
        active
    @endsection
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Learning</h3>
                <p class="text-subtitle text-muted">Learning.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Learning</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Learning</h4>
            </div>

            <div class="card-body">
                <a href="{{route('learning.add')}}" class="btn btn-success">Tambah</a>
                <p><br></p>
                @if (session('status'))
                <div class="alert alert-warning mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif
                <div class="col-12 table-responsive">
                    <table class="table table-bordered approval_datatable">
                        <thead>
                            <tr>
                                <th>Judul Learning</th>
                                <th>Point</th>
                                <th>Deskripsi Learning</th>
                                <th>Foto Learning</th>
                                <th>Tanggal</th>
                                <th width="100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    @push('scripts')
    <script type="text/javascript">
        $(function () {
          var table = $('.approval_datatable').DataTable({
              processing: true,
              serverSide: true,
              order: [], //Initial no order.
              aaSorting: [],
              ajax: "{{ route('learning') }}",
              columns: [
                  {data: 'judul_banner', name: 'judul_learning'},
                  {data: 'point', name: 'point'},
                  {data: 'deskripsi_banner', name: 'deskripsi_learning'},
                  {data: 'foto_learning', name: 'foto_learning'},
                  {data: 'created_at', name: 'created_at'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
        });
      </script>
    @endpush
</x-app-layout>
