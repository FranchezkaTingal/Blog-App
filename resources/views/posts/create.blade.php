<x-app-layout>
    <x-slot name="header"><div class="eyebrow">Your studio</div><h1>Write a new story.</h1></x-slot>
    <div class="surface form-shell">
        @if ($errors->any()) <div class="alert error" style="width:100%;margin:0 0 1rem;">Please check the highlighted fields.</div> @endif
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">@csrf
            <div class="field"><label for="title">Title</label><input id="title" type="text" name="title" value="{{ old('title') }}" required placeholder="Give your story a title"><x-input-error :messages="$errors->get('title')" class="field-error" /></div>
            <div class="field"><label for="body">Your story</label><textarea id="body" name="body" required placeholder="Start with the moment that stayed with you...">{{ old('body') }}</textarea><x-input-error :messages="$errors->get('body')" class="field-error" /></div>
            <div class="field"><label for="image">Cover image <span class="muted" style="font-weight:400;">(optional)</span></label><input id="image" type="file" name="image" accept="image/*"><x-input-error :messages="$errors->get('image')" class="field-error" /></div>
            <div class="form-actions"><a class="btn btn-secondary" href="{{ route('my-posts') }}">Cancel</a><button class="btn btn-primary" type="submit">Publish story ↗</button></div>
        </form>
    </div>
</x-app-layout>
