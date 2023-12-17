<div>
    @if (auth()->user()->role == 'admin')
    <div class="form-group"
    x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress">
        <label for="basicInput">Upload File <small>Maksimal 50MB</small></label>
        <input type="file" class="form-control" id="basicInput" placeholder="Upload File" wire:model="file.{{$model->id}}">
        <div x-show="isUploading">
            <progress max="100" x-bind:value="progress"></progress>
        </div>
        <button type="button" class="btn btn-primary btn-sm" wire:click="uploadFile('{{$model->id}}')" wire:loading.remove>Upload File</button>

    </div>
    @endif
    @if ($model->file)
      <a href="{{asset('storage/'.$model->file)}}" class="btn btn-success btn-sm">Unduh</a>
    @endif
  </div>