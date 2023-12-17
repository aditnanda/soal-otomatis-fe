<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <section class="section">
        <div class="row">
            <!-- Button trigger for full size modal -->
            <div class="col-md-12">

                <h6>Import Excel</h6>
                <a type="button" class="btn btn-success btn-sm" href="{{url('format_jurnal.xlsx')}}">
                    Format Import Data
                </a>
                <p><br></p>
                <div class="row">
                    <div class="col-md-3">
                        <input type="file" wire:model='file' placeholder="File Import" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <button type="button" wire:click='importData' placeholder="File Import" class="btn btn-success">Import Data</button>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>
