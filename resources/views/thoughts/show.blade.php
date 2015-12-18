@extends('app')

@section('content')

    <div class="entry-show">
        <img class="cover-image" src="{{ $entry->cover }}"/>

        <div class="text-over-cover">
            <div class="title">
                {{ $entry->title }}
            </div>
            <div class="text">
                {{ $entry->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
    <hr>
    {!! $entry->content !!}

@endsection