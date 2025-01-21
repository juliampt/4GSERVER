<!-- resources/views/post/index.blade.php -->
<x-layout title="Posts">
    <div class="container my-4">
        <h1 class="my-4">Posts</h1>
        @foreach($posts as $post)
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{{ $post->body }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
