<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $accounts = [
            ['name' => 'Mara Ellis', 'email' => 'admin@myblog.demo', 'password' => 'DemoAdmin123!', 'role' => 'admin'],
            ['name' => 'Jon Bell', 'email' => 'reader@myblog.demo', 'password' => 'DemoReader123!', 'role' => 'user'],
            ['name' => 'Nia Okafor', 'email' => 'nia@myblog.demo', 'password' => 'DemoWriter123!', 'role' => 'user'],
            ['name' => 'Theo Park', 'email' => 'theo@myblog.demo', 'password' => 'DemoWriter123!', 'role' => 'banned'],
        ];

        foreach ($accounts as $account) {
            User::updateOrCreate(
                ['email' => $account['email']],
                $account
            );
        }

        $authors = User::whereIn('email', ['reader@myblog.demo', 'nia@myblog.demo'])->get()->keyBy('email');
        $posts = [
            ['email' => 'reader@myblog.demo', 'title' => 'The quiet magic of an ordinary Tuesday', 'body' => 'Some days do not arrive with a grand announcement. They make themselves known in the warm mug between your hands, the song from the next room, and the walk you almost skipped.', 'image' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?auto=format&fit=crop&w=1200&q=80'],
            ['email' => 'nia@myblog.demo', 'title' => 'A field guide to paying attention', 'body' => 'Attention is a form of care. Here are five small rituals that helped me notice more: leave the headphones at home, keep a window open, and write down the color of the sky.', 'image' => 'https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1200&q=80'],
            ['email' => 'reader@myblog.demo', 'title' => 'Notes from the long way home', 'body' => 'I took the scenic route without meaning to. By the time I arrived, the day felt less like a list of tasks and more like a place I had actually visited.', 'image' => 'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?auto=format&fit=crop&w=1200&q=80'],
            ['email' => 'nia@myblog.demo', 'title' => 'The case for making things slowly', 'body' => 'There is a particular joy in work that leaves room for revision. A slower pace is not a lack of ambition; it is an invitation to make something with a pulse.', 'image' => 'https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=1200&q=80'],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(
                ['title' => $post['title']],
                ['user_id' => $authors[$post['email']]->id, 'body' => $post['body'], 'image' => $post['image']]
            );
        }
    }
}
