@extends('app')

@section('content-left')

    <div class="entry-body">
        <div class="title">
            {{ $entry->title }}
        </div>
        <div class="entry-date">
            {{ $entry->created_at->diffForHumans() }}
        </div>
        <hr>
        {!! $entry->content !!}
    </div>
@endsection