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
                <h3>Detail - Generate Otomatis</h3>
                <p class="text-subtitle text-muted">Detail - Generate Otomatis.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item " aria-current="page"><a href="{{route('generate_result')}}">Generate Otomatis</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail - Generate Otomatis</h4>
            </div>

            <div class="card-body">

                <div class="row mt-1 mr-1 ml-1">
                    <div class="col-md-3 text-center">
                        <div class="alert alert-info"
                            style="background-color: #5F8670!important; border-color: #5F8670!important; color: #ffffff!important;">
                            <p>Jumlah Soal Easy:</p>
                            <h2 class="queue-number" id="printed-number">{{$generate_result['easy']}}</h2>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="alert alert-info"
                            style="background-color: #FF9800!important; border-color: #FF9800!important; color: #ffffff!important;">
                            <p>Jumlah Soal Medium:</p>
                            <h2 class="queue-number" id="printed-number">{{$generate_result['medium']}}</h2>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="alert alert-info"
                            style="background-color: #B80000!important; border-color: #B80000!important; color: #ffffff!important;">
                            <p>Jumlah Soal Hard:</p>
                            <h2 class="queue-number" id="printed-number">{{$generate_result['hard']}}</h2>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-3 text-center">
                        <div class="alert alert-info"
                            style="background-color: #161A4D!important; border-color: #161A4D!important; color: #ffffff!important;">
                            <p>Jumlah Soal Keseluruhan:</p>
                            <h2 class="queue-number" id="printed-number">{{$generate_result['count']}}</h2>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="col-12 table-responsive">
                    <table class="table table-bordered approval_datatable">
                        <thead>
                            <tr>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Kunci Jawaban</th>
                                <th>Level</th>
                                <th>Kategori</th>
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
              serverSide: false,
              order: [], //Initial no order.
              aaSorting: [],
              ajax: "{{ route('generate_result.detail',['id' => $id]) }}",
              columns: [
                  {data: 'question', name: 'question'},
                  {data: 'jawaban', name: 'jawaban'},
                  {data: 'key_answer', name: 'key_answer'},
                  {data: 'level', name: 'level'},
                  {data: 'category', name: 'category'},
              ]
          });
        });
      </script>
    @endpush
</x-app-layout>
