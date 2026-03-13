<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        My Blog Posts
    </h2>
</x-slot>

<style>
    .posts-page {
        padding: 1.5rem 1rem 2.5rem;
    }

    .posts-feed {
        max-width: 960px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .posts-toolbar {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .create-post-button {
        display: inline-flex;
        align-items: center;
        gap: 0.65rem;
        padding: 0.85rem 1.2rem;
        border-radius: 999px;
        background: linear-gradient(135deg, #2563eb, #38bdf8);
        color: #fff;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 10px 30px rgba(37, 99, 235, 0.28);
        transition: transform 0.18s ease, box-shadow 0.18s ease;
    }

    .create-post-button:hover {
        transform: translateY(-1px);
        box-shadow: 0 14px 34px rgba(37, 99, 235, 0.36);
    }

    .post-card {
        position: relative;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        overflow: visible;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
    }

    .post-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 1rem;
        padding: 1.15rem 1.25rem 0;
    }

    .post-author-block {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        min-width: 0;
    }

    .post-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        flex-shrink: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #dbeafe, #bfdbfe);
        color: #1d4ed8;
        font-size: 1rem;
        font-weight: 800;
        text-transform: uppercase;
    }

    .post-author-meta {
        min-width: 0;
    }

    .post-author-name {
        margin: 0;
        font-size: 1rem;
        font-weight: 700;
        color: #111827;
        line-height: 1.2;
    }

    .post-author-date {
        margin: 0.2rem 0 0;
        color: #6b7280;
        font-size: 0.86rem;
    }

    .post-menu-wrap {
        position: relative;
        flex-shrink: 0;
    }

    .post-menu-trigger {
        width: 40px;
        height: 40px;
        border: none;
        border-radius: 999px;
        background: #f8fafc;
        color: #475569;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background-color 0.16s ease, color 0.16s ease;
    }

    .post-menu-trigger:hover {
        background: #e2e8f0;
        color: #111827;
    }

    .post-menu {
        position: absolute;
        right: 0;
        top: calc(100% + 0.5rem);
        min-width: 170px;
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        box-shadow: 0 20px 40px rgba(15, 23, 42, 0.15);
        padding: 0.35rem;
        display: none;
        z-index: 30;
    }

    .post-menu.is-open {
        display: block;
    }

    .post-menu-button,
    .post-menu-form button {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.75rem 0.85rem;
        border: none;
        background: transparent;
        border-radius: 10px;
        color: #0f172a;
        font-size: 0.92rem;
        font-weight: 600;
        cursor: pointer;
        text-align: left;
    }

    .post-menu-button:hover,
    .post-menu-form button:hover {
        background: #f8fafc;
    }

    .post-menu-form {
        margin: 0;
    }

    .post-menu-form button {
        color: #dc2626;
    }

    .post-menu-icon {
        width: 18px;
        height: 18px;
        flex-shrink: 0;
    }

    .post-content {
        padding: 1rem 1.25rem 1.25rem;
    }

    .post-title {
        margin: 0 0 0.65rem;
        font-size: 1.5rem;
        line-height: 1.25;
        font-weight: 800;
        color: #111827;
    }

    .post-excerpt {
        margin: 0;
        font-size: 1rem;
        line-height: 1.75;
        color: #4b5563;
    }

    .post-image {
        display: block;
        width: calc(100% - 2.5rem);
        margin: 0 1.25rem 1.25rem;
        max-height: 520px;
        object-fit: cover;
        border-radius: 10px;
    }

    .empty-state {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 2rem;
        text-align: center;
        color: #6b7280;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
    }

    .modal-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.55);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        z-index: 50;
    }

    .modal-backdrop.is-open {
        display: flex;
    }

    .modal-card {
        width: min(100%, 560px);
        background: #fff;
        border-radius: 16px;
        padding: 1.25rem;
        box-shadow: 0 20px 45px rgba(15, 23, 42, 0.2);
    }

    .modal-card h3 {
        margin-bottom: 1rem;
        font-size: 1.25rem;
        font-weight: 700;
        color: #111827;
    }

    .modal-field {
        margin-bottom: 1rem;
    }

    .modal-field label {
        display: block;
        margin-bottom: 0.4rem;
        font-weight: 600;
        color: #1f2937;
    }

    .modal-field input,
    .modal-field textarea {
        width: 100%;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        padding: 0.75rem 0.85rem;
    }

    .modal-field textarea {
        min-height: 140px;
        resize: vertical;
    }

    .modal-footer {
        display: flex;
        gap: 0.75rem;
        justify-content: flex-end;
    }

    .modal-button {
        border: 1px solid #d1d5db;
        background: #fff;
        color: #111827;
        padding: 0.65rem 1rem;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
    }

    .modal-button.primary {
        background: #2563eb;
        border-color: #2563eb;
        color: #fff;
    }

    @media (max-width: 768px) {
        .posts-page {
            padding: 1rem 0.75rem 2rem;
        }

        .posts-toolbar {
            justify-content: stretch;
        }

        .create-post-button {
            width: 100%;
            justify-content: center;
            border-radius: 16px;
        }

        .post-header {
            padding: 1rem 1rem 0;
        }

        .post-content {
            padding: 0.9rem 1rem 1rem;
        }

        .post-title {
            font-size: 1.3rem;
        }

        .post-image {
            width: calc(100% - 2rem);
            margin: 0 1rem 1rem;
            max-height: 340px;
        }
    }
</style>

<div class="posts-page">
    <div class="posts-feed">
        <div class="posts-toolbar">
            @can('create', \App\Models\Post::class)
                <button type="button" class="create-post-button" onclick="openModal('create-post-modal')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:20px;height:20px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Create Post
                </button>
            @endcan
        </div>

        @can('create', \App\Models\Post::class)
            <div id="create-post-modal" class="modal-backdrop" onclick="closeModal(event, 'create-post-modal')">
                <div class="modal-card">
                    <h3>Create Post</h3>

                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-field">
                            <label for="create-title">Title</label>
                            <input id="create-title" type="text" name="title" value="{{ old('title') }}" required>
                        </div>

                        <div class="modal-field">
                            <label for="create-body">Body</label>
                            <textarea id="create-body" name="body" required>{{ old('body') }}</textarea>
                        </div>

                        <div class="modal-field">
                            <label for="create-image">Image</label>
                            <input id="create-image" type="file" name="image">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="modal-button" onclick="closeModalById('create-post-modal')">Cancel</button>
                            <button type="submit" class="modal-button primary">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @forelse($posts as $post)
            <article class="post-card" data-menu-card>
                <div class="post-header">
                    <div class="post-author-block">
                        <div class="post-avatar">{{ strtoupper(substr($post->user->name, 0, 1)) }}</div>
                        <div class="post-author-meta">
                            <p class="post-author-name">{{ $post->user->name }}</p>
                            <p class="post-author-date">{{ $post->created_at?->format('M d, Y') }}</p>
                        </div>
                    </div>

                    <div class="post-menu-wrap">
                        <button type="button" class="post-menu-trigger" onclick="togglePostMenu(event, 'post-menu-{{ $post->id }}')" aria-label="Open post actions">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" style="width:18px;height:18px;">
                                <circle cx="12" cy="5" r="1.8"></circle>
                                <circle cx="12" cy="12" r="1.8"></circle>
                                <circle cx="12" cy="19" r="1.8"></circle>
                            </svg>
                        </button>

                        <div id="post-menu-{{ $post->id }}" class="post-menu">
                            @can('update', $post)
                                <button type="button" class="post-menu-button" onclick="closeAllPostMenus(); openModal('edit-modal-{{ $post->id }}')">
                                    <svg class="post-menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z" />
                                    </svg>
                                    Edit Post
                                </button>
                            @endcan

                            @can('delete', $post)
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="post-menu-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg class="post-menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 7.5h12m-10.5 0v10.125A2.625 2.625 0 0010.125 20.25h3.75A2.625 2.625 0 0016.5 17.625V7.5m-6 0V5.625A1.125 1.125 0 0111.625 4.5h.75A1.125 1.125 0 0113.5 5.625V7.5" />
                                        </svg>
                                        Delete Post
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="post-content">
                    <h3 class="post-title">{{ $post->title }}</h3>
                    <p class="post-excerpt">{{ $post->body }}</p>
                </div>

                @if($post->image)
                    <img class="post-image" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}">
                @endif
            </article>

            @can('update', $post)
                <div id="edit-modal-{{ $post->id }}" class="modal-backdrop" onclick="closeModal(event, 'edit-modal-{{ $post->id }}')">
                    <div class="modal-card">
                        <h3>Edit Post</h3>

                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="modal-field">
                                <label for="title-{{ $post->id }}">Title</label>
                                <input id="title-{{ $post->id }}" type="text" name="title" value="{{ $post->title }}">
                            </div>

                            <div class="modal-field">
                                <label for="body-{{ $post->id }}">Body</label>
                                <textarea id="body-{{ $post->id }}" name="body">{{ $post->body }}</textarea>
                            </div>

                            <div class="modal-field">
                                <label for="image-{{ $post->id }}">Image</label>
                                <input id="image-{{ $post->id }}" type="file" name="image">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="modal-button" onclick="closeModalById('edit-modal-{{ $post->id }}')">Cancel</button>
                                <button type="submit" class="modal-button primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endcan
        @empty
            <div class="empty-state">
                No blog posts found.
            </div>
        @endforelse
    </div>
</div>

<script>
    function closeAllPostMenus() {
        document.querySelectorAll('.post-menu.is-open').forEach(function (menu) {
            menu.classList.remove('is-open');
        });
    }

    function togglePostMenu(event, menuId) {
        event.stopPropagation();

        const menu = document.getElementById(menuId);
        const shouldOpen = menu && !menu.classList.contains('is-open');

        closeAllPostMenus();

        if (menu && shouldOpen) {
            menu.classList.add('is-open');
        }
    }

    function openModal(modalId) {
        const modal = document.getElementById(modalId);

        if (modal) {
            modal.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeModal(event, modalId) {
        if (event.target.id === modalId) {
            closeModalById(modalId);
        }
    }

    function closeModalById(modalId) {
        const modal = document.getElementById(modalId);

        if (modal) {
            modal.classList.remove('is-open');
            document.body.style.overflow = '';
        }
    }

    document.addEventListener('click', function () {
        closeAllPostMenus();
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeAllPostMenus();
            document.querySelectorAll('.modal-backdrop.is-open').forEach(function (modal) {
                modal.classList.remove('is-open');
            });
            document.body.style.overflow = '';
        }
    });
</script>

</x-app-layout>