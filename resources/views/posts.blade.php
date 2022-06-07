@extends('layout')


@section('content')
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            <div>
                <em>Publish Date: {{ $post->date }} </em>
                <p> {{ $post->excerpt }} </p>
            </div>
        </article>
    @endforeach
@endsection
