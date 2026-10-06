<x-app-layout>
    <x-slot name="header"><div class="eyebrow">Your studio</div><h1>Refine your story.</h1></x-slot>
    <div class="surface form-shell">
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">@csrf @method('PUT')
            <div class="field"><label for="title">Title</label><input id="title" type="text" name="title" value="{{ old('title', $post->title) }}" required><x-input-error :messages="$errors->get('title')" class="field-error" /></div>
            <div class="field"><label for="body">Your story</label><textarea id="body" name="body" required>{{ old('body', $post->body) }}</textarea><x-input-error :messages="$errors->get('body')" class="field-error" /></div>
            <div class="field"><label for="image">Replace cover image <span class="muted" style="font-weight:400;">(optional)</span></label><input id="image" type="file" name="image" accept="image/*"></div>
            <div class="form-actions"><a class="btn btn-secondary" href="{{ route('my-posts') }}">Cancel</a><button class="btn btn-primary" type="submit">Save changes</button></div>
        </form>
    </div>
</x-app-layout>
