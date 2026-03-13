<x-app-layout>

<x-slot name="header">
    <h2>Create Post</h2>
</x-slot>

<div style="padding:20px">

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

@csrf

<label>Title</label><br>
<input type="text" name="title">

<br><br>

<label>Body</label><br>
<textarea name="body"></textarea>

<br><br>

<label>Image</label><br>
<input type="file" name="image">

<br><br>

<button type="submit">Save Post</button>

</form>

</div>

</x-app-layout>