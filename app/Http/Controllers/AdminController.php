<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(Request $request): View
    {
        $section = $request->query('section', 'overview');
        if (!in_array($section, ['overview', 'posts', 'users'], true)) {
            $section = 'overview';
        }

        $posts = Post::with('user')->latest()->get();

        $users = User::query()->latest()->get();

        $recentActivity = $this->buildRecentActivity($posts, $users);
        $todayPosts = Post::whereDate('created_at', now()->toDateString())->count();
        $todayUsers = User::whereDate('created_at', now()->toDateString())->count();

        $stats = [
            'total_posts' => $posts->count(),
            'total_users' => $users->count(),
            'active_authors' => $posts->pluck('user_id')->unique()->count(),
            'site_traffic' => ($todayPosts * 120) + ($todayUsers * 35),
        ];

        return view('admin.dashboard', compact('posts', 'users', 'stats', 'recentActivity', 'section'));
    }

    public function destroyPost(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()
            ->route('admin.dashboard', ['section' => 'posts'])
            ->with('success', 'Post deleted successfully.');
    }

    public function banUser(User $user): RedirectResponse
    {
        if ($user->role === 'admin') {
            return redirect()
                ->route('admin.dashboard', ['section' => 'users'])
                ->with('error', 'Admin users cannot be banned.');
        }

        $user->role = 'banned';
        $user->save();

        return redirect()
            ->route('admin.dashboard', ['section' => 'users'])
            ->with('success', 'User has been banned.');
    }

    public function toggleUserRole(User $user): RedirectResponse
    {
        if (auth()->id() === $user->id) {
            return redirect()
                ->route('admin.dashboard', ['section' => 'users'])
                ->with('error', 'You cannot change your own role.');
        }

        if ($user->role === 'banned') {
            return redirect()
                ->route('admin.dashboard', ['section' => 'users'])
                ->with('error', 'Banned users cannot be toggled.');
        }

        $user->role = $user->role === 'admin' ? 'user' : 'admin';
        $user->save();

        return redirect()
            ->route('admin.dashboard', ['section' => 'users'])
            ->with('success', 'User role updated successfully.');
    }

    private function buildRecentActivity(Collection $posts, Collection $users): Collection
    {
        $postActivity = $posts->take(5)->map(function (Post $post) {
            return [
                'message' => 'New post published: ' . $post->title,
                'timestamp' => $post->created_at,
            ];
        });

        $userActivity = $users->take(5)->map(function (User $user) {
            return [
                'message' => 'New user joined: ' . $user->name,
                'timestamp' => $user->created_at,
            ];
        });

        return $postActivity
            ->concat($userActivity)
            ->sortByDesc('timestamp')
            ->take(5)
            ->values();
    }
}
