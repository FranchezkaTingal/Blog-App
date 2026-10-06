<x-app-layout>
    <style>
        .admin-shell {
            min-height: calc(100vh - 4rem);
            padding: 1.5rem;
            background:
                radial-gradient(circle at 12% 8%, rgba(56, 189, 248, 0.2), transparent 36%),
                radial-gradient(circle at 88% 0%, rgba(37, 99, 235, 0.16), transparent 32%),
                #0f172a;
            color: #e2e8f0;
        }

        .admin-grid {
            max-width: 1280px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 260px 1fr;
            gap: 1.25rem;
        }

        .glass {
            background: rgba(15, 23, 42, 0.62);
            border: 1px solid rgba(148, 163, 184, 0.24);
            border-radius: 16px;
            backdrop-filter: blur(8px);
            box-shadow: 0 18px 40px rgba(2, 6, 23, 0.35);
        }

        .sidebar {
            padding: 1rem;
            height: fit-content;
            position: sticky;
            top: 1rem;
        }

        .sidebar-title {
            margin: 0 0 1rem;
            font-size: 1.15rem;
            font-weight: 700;
            color: #f8fafc;
        }

        .sidebar-link {
            display: block;
            text-decoration: none;
            color: #cbd5e1;
            padding: 0.65rem 0.75rem;
            border-radius: 10px;
            margin-bottom: 0.45rem;
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        .sidebar-link:hover {
            color: #f8fafc;
            background: rgba(59, 130, 246, 0.24);
        }

        .sidebar-link.active {
            color: #f8fafc;
            background: rgba(59, 130, 246, 0.32);
        }

        .section-card {
            padding: 1rem;
        }

        .section-title {
            margin: 0 0 0.85rem;
            color: #f8fafc;
            font-size: 1.55rem;
            font-weight: 700;
        }

        .muted {
            color: #94a3b8;
            font-size: 0.92rem;
        }

        .alert {
            margin-bottom: 0.9rem;
            border-radius: 10px;
            padding: 0.7rem 0.9rem;
            font-size: 0.9rem;
        }

        .alert.success {
            border: 1px solid rgba(34, 197, 94, 0.45);
            background: rgba(34, 197, 94, 0.15);
            color: #bbf7d0;
        }

        .alert.error {
            border: 1px solid rgba(239, 68, 68, 0.45);
            background: rgba(239, 68, 68, 0.15);
            color: #fecaca;
        }

        .stats-grid {
            margin-top: 1rem;
            display: grid;
            gap: 0.8rem;
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .stat-card {
            border: 1px solid rgba(148, 163, 184, 0.24);
            border-radius: 12px;
            background: rgba(15, 23, 42, 0.45);
            padding: 0.85rem;
        }

        .stat-label {
            color: #94a3b8;
            font-size: 0.85rem;
        }

        .stat-value {
            margin-top: 0.3rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: #f8fafc;
        }

        .activity-list {
            margin-top: 1rem;
            display: grid;
            gap: 0.55rem;
        }

        .activity-item {
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 10px;
            padding: 0.7rem;
            background: rgba(15, 23, 42, 0.43);
        }

        .activity-message {
            color: #e2e8f0;
            font-size: 0.93rem;
        }

        .activity-time {
            color: #94a3b8;
            font-size: 0.8rem;
            margin-top: 0.25rem;
        }

        .posts-list {
            margin-top: 1rem;
            display: grid;
            gap: 0.6rem;
        }

        .post-row {
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 12px;
            padding: 0.75rem;
            background: rgba(15, 23, 42, 0.45);
            display: grid;
            grid-template-columns: 58px 1fr auto;
            align-items: center;
            gap: 0.8rem;
        }

        .thumb,
        .thumb-placeholder {
            width: 58px;
            height: 58px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid rgba(148, 163, 184, 0.25);
        }

        .thumb-placeholder {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.72rem;
            color: #94a3b8;
            background: rgba(15, 23, 42, 0.7);
        }

        .post-meta-title {
            font-size: 0.97rem;
            font-weight: 600;
            color: #f8fafc;
            margin-bottom: 0.2rem;
        }

        .post-meta-sub {
            color: #94a3b8;
            font-size: 0.82rem;
        }

        .post-row-info {
            cursor: pointer;
        }

        .post-row-info:hover .post-meta-title {
            color: #38bdf8;
            text-decoration: underline;
        }

        .admin-table-wrap {
            margin-top: 1rem;
            overflow-x: auto;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        .admin-table th,
        .admin-table td {
            text-align: left;
            padding: 0.7rem;
            border-bottom: 1px solid rgba(148, 163, 184, 0.2);
            color: #e2e8f0;
            font-size: 0.92rem;
            vertical-align: middle;
        }

        .role-pill {
            display: inline-flex;
            border-radius: 999px;
            padding: 0.18rem 0.55rem;
            font-size: 0.78rem;
            font-weight: 600;
            background: rgba(56, 189, 248, 0.18);
            color: #67e8f9;
        }

        .role-pill.banned {
            background: rgba(239, 68, 68, 0.16);
            color: #fca5a5;
        }

        .actions-inline {
            display: flex;
            align-items: center;
            gap: 0.45rem;
            flex-wrap: wrap;
        }

        .btn {
            border: 1px solid rgba(148, 163, 184, 0.4);
            color: #cbd5e1;
            background: transparent;
            border-radius: 8px;
            padding: 0.35rem 0.7rem;
            cursor: pointer;
            font-size: 0.84rem;
            transition: background-color 0.2s ease;
        }

        .btn:hover {
            background: rgba(148, 163, 184, 0.16);
        }

        .btn-danger {
            border-color: #ef4444;
            color: #ef4444;
        }

        .btn-danger:hover {
            background: rgba(239, 68, 68, 0.12);
        }

        .modal {
            position: fixed;
            inset: 0;
            z-index: 60;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            background: rgba(2, 6, 23, 0.72);
        }

        .modal.open {
            display: flex;
        }

        .modal-card {
            width: min(100%, 440px);
            border-radius: 14px;
            padding: 1rem;
            border: 1px solid rgba(148, 163, 184, 0.3);
            background: #111827;
        }

        .modal-actions {
            margin-top: 1rem;
            display: flex;
            justify-content: flex-end;
            gap: 0.6rem;
        }

        @media (max-width: 1024px) {
            .admin-grid {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }

            .stats-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 640px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .post-row {
                grid-template-columns: 1fr;
                justify-items: start;
            }
        }

        /* Admin uses the same editorial system as the reader experience. */
        .admin-shell {
            min-height: calc(100vh - 4rem);
            padding: 2rem 0 4rem;
            background:
                radial-gradient(circle at 8% 0%, rgba(231, 111, 81, .08), transparent 28rem),
                radial-gradient(circle at 95% 12%, rgba(148, 166, 132, .12), transparent 24rem),
                var(--paper);
            color: var(--ink);
        }
        .admin-grid { width: min(1160px, calc(100% - 2.5rem)); grid-template-columns: 230px 1fr; gap: 1.25rem; }
        .glass, .section-card { border: 1px solid var(--line); border-radius: 22px; background: rgba(255,253,250,.82); box-shadow: var(--shadow); backdrop-filter: blur(12px); }
        .sidebar { padding: 1rem; top: 96px; }
        .sidebar-title { color: var(--ink); font: 700 1.35rem 'Playfair Display', Georgia, serif; margin-bottom: 1.25rem; }
        .sidebar-link { color: var(--muted); margin-bottom: .25rem; padding: .7rem .8rem; }
        .sidebar-link:hover, .sidebar-link.active { color: var(--coral-dark); background: #fff0eb; }
        .section-card { padding: 1.35rem; }
        .section-title { color: var(--ink); font: 700 2rem 'Playfair Display', Georgia, serif; letter-spacing: -.03em; }
        .muted, .stat-label, .post-meta-sub, .activity-time { color: var(--muted); }
        .stat-card, .activity-item, .post-row { border: 1px solid var(--line); border-radius: 15px; background: #fff; }
        .stat-card { padding: 1rem; }
        .stat-value { color: var(--ink); font: 700 2rem 'Playfair Display', Georgia, serif; }
        .activity-item { padding: .85rem; }
        .activity-message, .post-meta-title { color: var(--ink); }
        .post-row { padding: .8rem; }
        .role-pill { background: #edf5eb; color: #4f704b; }
        .role-pill.banned { background: #fff0eb; color: var(--coral-dark); }
        .admin-table th, .admin-table td { color: var(--ink); border-color: var(--line); }
        .btn { border-radius: 999px; border-color: var(--line); color: var(--ink); background: #fff; }
        .btn:hover { background: #fff0eb; }
        .btn-danger { border-color: #efc6bf; color: var(--coral-dark); background: #fff4f1; }
        .modal { background: rgba(23, 32, 42, .48); }
        .modal-card { border: 1px solid var(--line); border-radius: 20px; background: var(--surface); color: var(--ink); box-shadow: 0 24px 70px rgba(37,44,47,.18); }
        #pdm-title, #delete-post-modal h4 { color: var(--ink) !important; font-family: 'Playfair Display', Georgia, serif; }
        #pdm-body { color: var(--muted) !important; }
    </style>

    <div class="admin-shell">
        <div class="admin-grid">
            <aside class="sidebar glass">
                <h2 class="sidebar-title">Admin Dashboard</h2>
                <a class="sidebar-link {{ $section === 'overview' ? 'active' : '' }}" href="{{ route('admin.dashboard', ['section' => 'overview']) }}">System Overview</a>
                <a class="sidebar-link {{ $section === 'posts' ? 'active' : '' }}" href="{{ route('admin.dashboard', ['section' => 'posts']) }}">All Posts</a>
                <a class="sidebar-link {{ $section === 'users' ? 'active' : '' }}" href="{{ route('admin.dashboard', ['section' => 'users']) }}">User Management</a>
            </aside>

            <main>
                @if(session('success'))
                    <div class="alert success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert error">{{ session('error') }}</div>
                @endif

                @if($section === 'overview')
                    <section class="section-card glass">
                        <h3 class="section-title">System Overview</h3>
                        <p class="muted">Quick health snapshot for your platform.</p>

                        <div class="stats-grid">
                            <div class="stat-card">
                                <div class="stat-label">Total Users</div>
                                <div class="stat-value">{{ $stats['total_users'] }}</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-label">Total Posts</div>
                                <div class="stat-value">{{ $stats['total_posts'] }}</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-label">Active Authors</div>
                                <div class="stat-value">{{ $stats['active_authors'] }}</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-label">Site Traffic</div>
                                <div class="stat-value">{{ number_format($stats['site_traffic']) }}</div>
                            </div>
                        </div>
                    </section>

                    <section class="section-card glass" style="margin-top:1rem;">
                        <h3 class="section-title" style="font-size:1.2rem;">Recent Activity</h3>
                        <div class="activity-list">
                            @forelse($recentActivity as $activity)
                                <div class="activity-item">
                                    <div class="activity-message">{{ $activity['message'] }}</div>
                                    <div class="activity-time">{{ $activity['timestamp']?->diffForHumans() ?? 'Unknown time' }}</div>
                                </div>
                            @empty
                                <div class="activity-item">
                                    <div class="activity-message">No recent activity yet.</div>
                                </div>
                            @endforelse
                        </div>
                    </section>
                @endif

                @if($section === 'posts')
                    <section class="section-card glass">
                        <h3 class="section-title">All Posts</h3>
                        <p class="muted">Browse every post in the system and quickly moderate content.</p>

                        <div class="posts-list">
                            @forelse($posts as $post)
                                <article class="post-row"
                                    data-post-title="{{ e($post->title) }}"
                                    data-post-author="{{ e($post->user->name ?? 'Unknown') }}"
                                    data-post-date="{{ $post->created_at?->format('M d, Y') }}"
                                    data-post-body="{{ e($post->body) }}"
                                    data-post-image="{{ $post->image ? asset('storage/'.$post->image) : '' }}">
                                    @if($post->image)
                                        <img class="thumb" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }} thumbnail">
                                    @else
                                        <div class="thumb-placeholder">No Image</div>
                                    @endif

                                    <div class="post-row-info" onclick="openPostDetailModal(this.closest('article'))">
                                        <div class="post-meta-title">{{ $post->title }}</div>
                                        <div class="post-meta-sub">
                                            By {{ $post->user->name ?? 'Unknown' }} • {{ $post->created_at?->format('M d, Y') }}
                                        </div>
                                    </div>

                                    <div>
                                        <button
                                            type="button"
                                            class="btn btn-danger"
                                            data-post-title="{{ $post->title }}"
                                            data-action="{{ route('admin.posts.destroy', $post) }}"
                                            onclick="openDeleteModal(this)">
                                            Delete
                                        </button>
                                    </div>
                                </article>
                            @empty
                                <article class="post-row">
                                    <div class="post-meta-sub">No posts found.</div>
                                </article>
                            @endforelse
                        </div>
                    </section>
                @endif

                @if($section === 'users')
                    <section class="section-card glass">
                        <h3 class="section-title">User Management</h3>
                        <p class="muted">Manage roles and moderation controls for registered users.</p>

                        <div class="admin-table-wrap">
                            <table class="admin-table">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Join Date</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at?->format('M d, Y') }}</td>
                                            <td>
                                                <span class="role-pill {{ $user->role === 'banned' ? 'banned' : '' }}">{{ ucfirst($user->role ?? 'user') }}</span>
                                            </td>
                                            <td>
                                                <div class="actions-inline">
                                                    @if(auth()->id() === $user->id)
                                                        <span class="muted">Protected</span>
                                                    @else
                                                        @if($user->role !== 'banned')
                                                            <form method="POST" action="{{ route('admin.users.ban', $user) }}">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit" class="btn btn-danger">Ban User</button>
                                                            </form>
                                                        @else
                                                            <span class="muted">Already banned</span>
                                                        @endif

                                                        @if($user->role !== 'banned')
                                                            <form method="POST" action="{{ route('admin.users.toggle-role', $user) }}">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit" class="btn">
                                                                    {{ $user->role === 'admin' ? 'Set as User' : 'Set as Admin' }}
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">No users found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </section>
                @endif
            </main>
        </div>
    </div>

    {{-- Post Detail Modal --}}
    <div id="post-detail-modal" class="modal" onclick="dismissPostDetailModal(event)">
        <div class="modal-card" style="width:min(100%,620px);">
            <div id="pdm-image-wrap" style="margin-bottom:0.75rem; display:none;">
                <img id="pdm-image" src="" alt="" style="width:100%; max-height:260px; object-fit:cover; border-radius:10px; border:1px solid rgba(148,163,184,0.2);">
            </div>
            <h3 id="pdm-title" style="font-size:1.2rem; font-weight:700; color:#f8fafc; margin-bottom:0.4rem;"></h3>
            <p id="pdm-meta" class="muted" style="margin-bottom:0.75rem;"></p>
            <div id="pdm-body" style="color:#cbd5e1; font-size:0.94rem; line-height:1.65; white-space:pre-wrap; max-height:280px; overflow-y:auto;"></div>
            <div class="modal-actions">
                <button type="button" class="btn" onclick="closePostDetailModal()">Close</button>
            </div>
        </div>
    </div>

    <div id="delete-post-modal" class="modal" onclick="dismissDeleteModal(event)">
        <div class="modal-card">
            <h4 style="font-size:1.05rem; font-weight:700; margin-bottom:0.5rem; color:#f8fafc;">Delete Post</h4>
            <p id="delete-post-message" class="muted">Are you sure you want to delete this post?</p>

            <form id="delete-post-form" method="POST" action="">
                @csrf
                @method('DELETE')

                <div class="modal-actions">
                    <button type="button" class="btn" onclick="closeDeleteModal()">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openDeleteModal(button) {
            const modal = document.getElementById('delete-post-modal');
            const form = document.getElementById('delete-post-form');
            const message = document.getElementById('delete-post-message');
            const postTitle = button.getAttribute('data-post-title') || 'this post';
            const action = button.getAttribute('data-action');

            form.action = action;
            message.textContent = 'Are you sure you want to delete "' + postTitle + '"? This action cannot be undone.';
            modal.classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteModal() {
            const modal = document.getElementById('delete-post-modal');
            modal.classList.remove('open');
            document.body.style.overflow = '';
        }

        function dismissDeleteModal(event) {
            if (event.target.id === 'delete-post-modal') {
                closeDeleteModal();
            }
        }

        function openPostDetailModal(article) {
            const modal = document.getElementById('post-detail-modal');
            const title  = article.getAttribute('data-post-title')  || '';
            const author = article.getAttribute('data-post-author') || 'Unknown';
            const date   = article.getAttribute('data-post-date')   || '';
            const body   = article.getAttribute('data-post-body')   || '';
            const image  = article.getAttribute('data-post-image')  || '';

            document.getElementById('pdm-title').textContent = title;
            document.getElementById('pdm-meta').textContent  = 'By ' + author + ' \u2022 ' + date;
            document.getElementById('pdm-body').textContent  = body;

            const imgWrap = document.getElementById('pdm-image-wrap');
            const img     = document.getElementById('pdm-image');
            if (image) {
                img.src = image;
                img.alt = title;
                imgWrap.style.display = 'block';
            } else {
                imgWrap.style.display = 'none';
            }

            modal.classList.add('open');
            document.body.style.overflow = 'hidden';
        }

        function closePostDetailModal() {
            document.getElementById('post-detail-modal').classList.remove('open');
            document.body.style.overflow = '';
        }

        function dismissPostDetailModal(event) {
            if (event.target.id === 'post-detail-modal') {
                closePostDetailModal();
            }
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeDeleteModal();
                closePostDetailModal();
            }
        });
    </script>
</x-app-layout>
