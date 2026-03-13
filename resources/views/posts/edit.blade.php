<x-app-layout>

<x-slot name="header">
    <h2>Edit Post</h2>
</x-slot>

<div style="padding:20px">

<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')

<label>Title</label><br>
<input type="text" name="title" value="{{ $post->title }}">

<br><br>

<label>Body</label><br>
<textarea name="body">{{ $post->body }}</textarea>

<br><br>

<label>Image</label><br>
<input type="file" name="image">

<br><br>

<button type="submit">Update</button>

</form>

</div>

</x-app-layout>