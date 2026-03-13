<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color:#e2e8f0;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        /* ── Full-page dark override (dashboard only) ── */
        body,
        .min-h-screen {
            background: #0a0f1e !important;
        }

        header.bg-white {
            background: #0f172a !important;
            border-bottom: 1px solid rgba(59, 130, 246, 0.2) !important;
            box-shadow: 0 1px 16px rgba(0, 0, 0, 0.6) !important;
        }

        .db-feed {
            max-width: 640px;
            margin: 0 auto;
            padding: 2rem 1rem;
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        /* ── Card shell ── */
        .db-card {
            background: #111827;
            border: 1px solid rgba(59, 130, 246, 0.18);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.4);
            transition: box-shadow 0.22s ease, border-color 0.22s ease;
        }

        .db-card:hover {
            border-color: rgba(59, 130, 246, 0.55);
            box-shadow: 0 0 0 1px rgba(59,130,246,0.25), 0 6px 28px rgba(59,130,246,0.15);
        }

        /* ── Author header ── */
        .db-card-header {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.85rem 1rem 0;
        }

        .db-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.15);
            border: 1.5px solid rgba(59, 130, 246, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            overflow: hidden;
        }

        .db-avatar svg {
            width: 22px;
            height: 22px;
            color: #60a5fa;
        }

        .db-author-name {
            font-size: 0.95rem;
            font-weight: 700;
            color: #f1f5f9;
            line-height: 1.2;
        }

        .db-post-date {
            font-size: 0.78rem;
            color: #4b6280;
            margin-top: 0.1rem;
        }

        /* ── Text body ── */
        .db-card-body {
            padding: 0.75rem 1rem 0.9rem;
        }

        .db-title {
            font-size: 1rem;
            font-weight: 700;
            color: #e2e8f0;
            margin: 0 0 0.4rem;
        }

        .db-excerpt {
            font-size: 0.95rem;
            color: #94a3b8;
            line-height: 1.65;
            margin: 0;
        }

        /* ── Full-width image ── */
        .db-card-image {
            width: 100%;
            display: block;
            max-height: 420px;
            object-fit: cover;
            margin-top: 0.65rem;
            border-top: 1px solid rgba(59,130,246,0.1);
        }

        /* ── Empty state ── */
        .db-empty {
            text-align: center;
            padding: 3rem 1rem;
            color: #475569;
            font-size: 0.95rem;
        }
    </style>

    <div class="db-page-wrapper" style="min-height:100vh; background:#0a0f1e; padding: 1.5rem 0;">
        <div class="db-feed">
            @forelse($posts as $post)
                <article class="db-card">

                    {{-- Author header --}}
                    <div class="db-card-header">
                        <div class="db-avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                      d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="db-author-name">{{ $post->user->name }}</div>
                            <div class="db-post-date">{{ $post->created_at?->format('M d, Y') }}</div>
                        </div>
                    </div>

                    {{-- Title + excerpt --}}
                    <div class="db-card-body">
                        <p class="db-title">{{ $post->title }}</p>
                        <p class="db-excerpt">{{ $post->body }}</p>
                    </div>

                    {{-- Full-width image --}}
                    @if($post->image)
                        <img class="db-card-image"
                             src="{{ asset('storage/'.$post->image) }}"
                             alt="{{ $post->title }}">
                    @endif

                </article>
            @empty
                <div class="db-empty">No posts available yet.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>
