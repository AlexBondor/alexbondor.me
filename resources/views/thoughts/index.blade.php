@extends('app')

@section('content-left')

    @foreach($entries as $entry)
        <div class="entry" onclick="showEntry('{{ $entry->slug }}')">
            <img class="cover-image" src="{{ $entry->cover }}"/>

            <div class="text-over-cover">
                <div class="title">
                    {{ $entry->title }}
                </div>
                <div class="entry-date">
                    {{ $entry->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
        <br>
    @endforeach

@section('script')
    @parent
    <script type="text/javascript">
        function showEntry(slug) {
            document.location.href = '/thoughts/' + slug;
        }

        function convertToSlug(text) {
            return text
                    .toLowerCase()
                    .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');
        }
    </script>
@endsection
@endsection