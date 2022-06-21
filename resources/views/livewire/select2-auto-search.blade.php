<div>

    <div wire:ignore>
        <select class="form-control" id="select2">
            <option value="">Choose Song</option>
            @foreach ($songs as $data)
                <option value="{{ $data }}">{{ $data }}</option>
            @endforeach
        </select>
    </div>

</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#select2').select2();
            $('#select2').on('change', function(e) {
                var item = $('#select2').select2("val");
                @this.set('viralSongs', item);
            });
        });
    </script>
@endpush
