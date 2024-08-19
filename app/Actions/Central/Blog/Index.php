<?php

namespace App\Actions\Central\Blog;

use App\Models\Post;
use Lorisleiva\Actions\Concerns\AsAction;

class Index
{
    use AsAction;

    public function handle()
    {
        $posts = Post::orderBy("created_at", "Desc")->get();
        return $posts;
    }

    public function asController()
    {
        return view("dashboard",['posts' => $this->handle()]);
    }
}
