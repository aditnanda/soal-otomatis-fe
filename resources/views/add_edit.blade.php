<x-app-layout>

    @section('Manajemen')
        active
    @endsection

    @section('Learning')
        active
    @endsection

    @section('script')
    <script type="text/javascript">
        tinymce.init({
        selector: 'textarea.deskripsi',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount', 'image'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
</script>
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
                <h4 class="card-title">Tambah/Ubah Data Learning</h4>
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
                <form action="{{ route('learning.update',['id' => \Crypt::encrypt($learning)]) }}" method="post" enctype='multipart/form-data'>
                    @csrf
                @endif
                @if ($tipe == 'add')
                <form action="{{ route('learning.store') }}" method="post" enctype='multipart/form-data'>
                    @csrf
                @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Judul Learning</label>
                                <input type="text" class="form-control" id="basicInput"  name="judul_banner" value="{{@$learning['judul_banner']}}">
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Jenis Learning</label>
                                <input type="text" class="form-control" id="basicInput"  name="jenis" value="{{@$learning['jenis']}}">
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Point</label>
                                <input type="number" class="form-control" id="basicInput"  name="point" value="{{@$learning['point']}}">
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Deskripsi Learning</label>
                                <textarea type="text" class="form-control deskripsi" id="deskripsi"  name="deskripsi_banner" value="{{@$learning['deskripsi_banner']}}">{!!@$learning['deskripsi_banner']!!}</textarea>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Foto Learning</label>
                                <input class="form-control" id="basicInput"  name="foto_banner" value="{{@$learning['foto_banner']}}" type="file">
                                @if ($learning)
                                @if ($learning['foto_banner'])
                                <img src="{{$base_koperasi.@$learning['foto_banner']}}" alt="" class="img-fluid">
                                @endif
                                @endif
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Iframe Video</label>
                                <input type="text" class="form-control" id="basicInput"  name="iframe_youtube" value="{{@$learning['iframe_youtube']}}">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


</x-app-layout>
