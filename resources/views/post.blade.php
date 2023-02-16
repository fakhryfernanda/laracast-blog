@extends('layout')

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>
        <p>
            In category <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>

        <div>
            {!! $post->body !!}
        </div>
    </article>

    <a href="/">Go back</a>
@endsection