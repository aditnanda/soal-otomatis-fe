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
                <h4 class="card-title">Tambah Data Generate Otomatis</h4>
            </div>

            <div class="card-body">
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
                @if ($tipe == 'edit')
                <form action="{{ route('generate_result.update',['id' => \Crypt::encrypt($generate_result)]) }}" method="post" enctype='multipart/form-data'>
                    @csrf
                @endif
                @if ($tipe == 'add')
                <form action="{{ route('generate_result.store') }}" method="post" enctype='multipart/form-data'>
                    @csrf
                @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="easy">Easy<span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="easy" name="easy" value="{{old('easy')}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="medium">Medium<span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="medium" name="medium" value="{{old('medium')}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="hard">Hard<span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="hard" name="hard" value="{{old('hard')}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="count">Total Soal<span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="count" name="count" value="{{old('count')}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category">Kategori</label>
                                <input type="text" class="form-control" id="category" name="category" value="{{old('category')}}" >
                            </div>
                        </div>



                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


</x-app-layout>
