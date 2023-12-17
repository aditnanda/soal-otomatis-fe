<x-app-layout>
    @section('Bank Soal')
        active
    @endsection

    @section('Bank Soal')
        active
    @endsection
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Bank Soal</h3>
                <p class="text-subtitle text-muted">Bank Soal.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Bank Soal</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Bank Soal</h4>
            </div>

            <div class="card-body">
                <a href="{{route('question.add')}}" class="btn btn-success">Tambah</a>
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
                                <th>Pertanyaan</th>
                                <th>Jawaban a</th>
                                <th>Jawaban b</th>
                                <th>Jawaban c</th>
                                <th>Jawaban d</th>
                                <th>Kunci Jawaban</th>
                                <th>Level</th>
                                <th>Kategori</th>
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
              ajax: "{{ route('question') }}",
              columns: [
                  {data: 'question', name: 'question'},
                  {data: 'answer_a', name: 'answer_a'},
                  {data: 'answer_b', name: 'answer_b'},
                  {data: 'answer_c', name: 'answer_c'},
                  {data: 'answer_d', name: 'answer_d'},
                  {data: 'key_answer', name: 'key_answer'},
                  {data: 'level', name: 'level'},
                  {data: 'category', name: 'category'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
        });
      </script>
    @endpush
</x-app-layout>
