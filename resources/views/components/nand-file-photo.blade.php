<div>
  @if ($model->file)
  <div>
    <img src="{{asset('storage/'.$model->file)}}" alt="" height="90px">
  </div>
  @endif
</div>