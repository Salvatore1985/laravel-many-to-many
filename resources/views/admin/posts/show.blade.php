@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="title">
                    {{ $post->title }}
                </h1>
                <h4>
                    {{ $post->user_id }}
                </h4>
                <h4>
                    {{ $post->created_at }}
                </h4>
            </div>
            <div class="col-12">
                <img src="{{ $post->image_url }}" alt="image{{ $post->title }}">
            </div>
            <div class="col-12 mt-2">
                {{ $post->content }}
            </div>
            <div class="col-12 mt-2">
                <h2>Post dello stesso autore</h2>
                @foreach ($post->user->posts as $key => $post)
                    <h5>Post numero: {{ $key + 1 }} -
                        <a class="text-decoration-none"
                            href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a>
                        - fatto il {{ $post->created_at }}
                    </h5>
                    <h5>{{ substr($post->content, 0, 50) }}...</h5>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@dump($post->user->posts)
