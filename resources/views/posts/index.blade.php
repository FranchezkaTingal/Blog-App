<x-app-layout>
    <x-slot name="header"><div class="eyebrow">Your archive</div><h1>My stories.</h1></x-slot>
    @if(session('success')) <div class="alert success">{{ session('success') }}</div> @endif
    <div class="container" style="padding:1rem 0 4rem;">
        <div style="display:flex;justify-content:flex-end;margin-bottom:1rem;"><a class="btn btn-primary" href="{{ route('posts.create') }}">Write a new story ＋</a></div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1rem;">
            @forelse($posts as $post)
                <article class="surface post-card">
                    @if($post->image) @php($imageUrl = str_starts_with($post->image, 'http') ? $post->image : asset('storage/'.$post->image))<img class="post-card-image" src="{{ $imageUrl }}" alt="{{ $post->title }}"> @endif
                    <div class="post-card-body"><div class="eyebrow">{{ $post->created_at?->format('M d, Y') }}</div><h2>{{ $post->title }}</h2><p>{{ Str::limit($post->body, 120) }}</p><div style="display:flex;gap:.5rem;margin-top:1rem;"><a class="btn btn-secondary" href="{{ route('posts.edit', $post) }}">Edit</a><form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Delete this story?')">@csrf @method('DELETE')<button class="btn btn-danger" type="submit">Delete</button></form></div></div>
                </article>
            @empty
                <div class="surface empty-state" style="grid-column:1/-1;"><div class="eyebrow">Your archive is quiet</div><h2>Start with one good story.</h2><a class="btn btn-primary" href="{{ route('posts.create') }}">Create a post</a></div>
            @endforelse
        </div>
    </div>
</x-app-layout>
