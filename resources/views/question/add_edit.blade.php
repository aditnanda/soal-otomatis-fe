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
                <h4 class="card-title">Tambah/Ubah Data Bank Soal</h4>
            </div>

            <div class="card-body">
                @if (session('status_profile_update'))
                <div class="alert alert-success mb-4 font-medium text-sm text-green-600">
                    {{ session('status_profile_update') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif
                @if ($tipe == 'edit')
                <form action="{{ route('question.update',['id' => \Crypt::encrypt($question)]) }}" method="post" enctype='multipart/form-data'>
                    @csrf
                @endif
                @if ($tipe == 'add')
                <form action="{{ route('question.store') }}" method="post" enctype='multipart/form-data'>
                    @csrf
                @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="question">Question<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="question" name="question" value="{{@$question['question']}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="answer_a">Answer A<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="answer_a" name="answer_a" value="{{@$question['answer_a']}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="answer_b">Answer B<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="answer_b" name="answer_b" value="{{@$question['answer_b']}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="answer_c">Answer C<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="answer_c" name="answer_c" value="{{@$question['answer_c']}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="answer_d">Answer D<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="answer_d" name="answer_d" value="{{@$question['answer_d']}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="key_answer">Key Answer<span style="color: red;">*</span></label>
                                <select name="key_answer" id=""  class="form-control" >
                                    <option value="">Pilih</option>
                                    <option value="a" {{(@$question['key_answer'] == 'a') ? 'selected' : ''}}>A</option>
                                    <option value="b" {{(@$question['key_answer'] == 'b') ? 'selected' : ''}}>B</option>
                                    <option value="c" {{(@$question['key_answer'] == 'c') ? 'selected' : ''}}>C</option>
                                    <option value="d" {{(@$question['key_answer'] == 'd') ? 'selected' : ''}}>D</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="level">Level<span style="color: red;">*</span></label>
                                <select name="level" id=""  class="form-control" >
                                    <option value="">Pilih</option>
                                    <option value="easy" {{(@$question['level'] == 'easy') ? 'selected' : ''}}>Easy</option>
                                    <option value="medium" {{(@$question['level'] == 'medium') ? 'selected' : ''}}>Medium</option>
                                    <option value="hard" {{(@$question['level'] == 'hard') ? 'selected' : ''}}>Hard</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category">Category<span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="category" name="category" value="{{@$question['category']}}" required>
                            </div>
                        </div>




                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


</x-app-layout>
