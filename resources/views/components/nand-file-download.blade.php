<div>
  @if ($model->file)
  <a href="{{asset('storage/'.$model->file)}}" class="btn btn-success btn-sm">Unduh</a>
  @endif
</div>