@extends('app')

@section('content')
    <div class="row">
        <div id="left" class="col-xs-2">
            <div class="name center-text">Alex Bondor</div>
            <div class="title center-text">Computer Scientist</div>
            <div class="subtitle center-text">Doer | Creator | Persuader</div>
        </div>
        <div id="right" class="col-xs-10">
            <div class="row text">
                <div class="col-xs-3">
                    <a href="/" class="link">
                        >_ projects
                    </a>
                </div>
                <div class="col-xs-3">
                    <a href="/thoughts" class="link">
                        >_ thoughts
                    </a>
                </div>
                <div class="col-xs-3">
                    <a href="https://github.com/AlexBondor" class="link" target="_blank">
                        >_ github
                    </a>
                </div>
                <div class="col-xs-3">
                    <a href="https://www.linkedin.com/in/alexandrubondor" class="link" target="_blank">
                        >_ linkedin
                    </a>
                </div>
            </div>
            <br>

            @foreach($entries as $entry)
                <div class="entry" onclick="showEntry('{{ $entry->slug }}')">
                    <img class="cover-image" src="{{ $entry->cover }}"/>
                    <div class="text-over-cover">
                        <div class="title">
                            >_ {{ $entry->title }}
                        </div>
                        <div class="text">
                            {{ $entry->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>
@section('script')
    @parent
    <script type="text/javascript">
        function showEntry(slug) {
            document.location.href = '/thoughts/' + slug;
        }

        function convertToSlug(text)
        {
            return text
                    .toLowerCase()
                    .replace(/ /g,'-')
                    .replace(/[^\w-]+/g,'');
        }
    </script>
@endsection
@endsection