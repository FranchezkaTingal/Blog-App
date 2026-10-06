<x-app-layout>
    <x-slot name="header">
        <div class="eyebrow">The latest from the community</div>
        <h1>Good morning, {{ Str::before(Auth::user()->name, ' ') }}.</h1>
    </x-slot>
    @if(session('success')) <div class="alert success">{{ session('success') }}</div> @endif
    <div class="container feed-layout">
        <section style="display:grid;gap:1rem;">
            @forelse($posts as $post)
                <article class="surface post-card">
                    @if($post->image)
                        @php($imageUrl = str_starts_with($post->image, 'http') ? $post->image : asset('storage/'.$post->image))
                        <img class="post-card-image" src="{{ $imageUrl }}" alt="{{ $post->title }}">
                    @endif
                    <div class="post-card-body">
                        <div class="post-meta"><span class="avatar" style="width:28px;height:28px;">{{ strtoupper(substr($post->user->name, 0, 1)) }}</span><strong>{{ $post->user->name }}</strong><span>·</span><span>{{ $post->created_at?->format('M d, Y') }}</span></div>
                        <h2>{{ $post->title }}</h2><p>{{ Str::limit($post->body, 220) }}</p>
                    </div>
                </article>
            @empty
                <div class="surface empty-state"><div class="eyebrow">A blank page</div><h2>No stories yet.</h2><p class="muted">Be the first voice in the room.</p><a class="btn btn-primary" href="{{ route('posts.create') }}">Write a story</a></div>
            @endforelse
        </section>
        <aside class="surface side-card">
            <div class="eyebrow">Your corner</div><h3>Make something worth reading.</h3>
            <p>Share a thought, a lesson, or a tiny moment from your week with the myblog community.</p>
            <a class="btn btn-primary" href="{{ route('posts.create') }}" style="width:100%;margin-top:.5rem;">New story <span>＋</span></a>
            <div style="margin-top:1.5rem;padding-top:1rem;border-top:1px solid var(--line);"><div class="muted" style="font-size:.75rem;">COMMUNITY NOTE</div><p style="margin:.35rem 0 0;font-size:.82rem;">Good writing doesn't need to shout. It just needs to be true.</p></div>
        </aside>
    </div>
</x-app-layout>
