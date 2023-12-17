<x-app-layout>
    @section('Generate Otomatis')
        active
    @endsection

    @section('Generate Otomatis')
        active
    @endsection
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Generate Otomatis</h3>
                <p class="text-subtitle text-muted">Generate Otomatis.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Generate Otomatis</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Generate Otomatis</h4>
            </div>

            <div class="card-body">
                <a href="{{route('generate_result.add')}}" class="btn btn-success">Tambah</a>
                <p><br></p>
                @if (session('status'))
                <div class="alert alert-success mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif
                @if (session('status_danger'))
                <div class="alert alert-danger mb-4 font-medium text-sm text-red-600">
                    {{ session('status_danger') }}
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
                                <th>Jumlah Pertanyaan Mudah</th>
                                <th>Jumlah Pertanyaan Sedang</th>
                                <th>Jumlah Pertanyaan Sulit</th>
                                <th>Kategori</th>
                                <th>Jumlah Pertanyaan Keseluruhan</th>

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
              ajax: "{{ route('generate_result') }}",
              columns: [
                  {data: 'easy', name: 'easy'},
                  {data: 'medium', name: 'medium'},
                  {data: 'hard', name: 'hard'},
                  {data: 'category', name: 'category'},
                  {data: 'count', name: 'count'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
        });
      </script>
    @endpush
</x-app-layout>
