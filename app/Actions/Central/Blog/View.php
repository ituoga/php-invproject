<?php

namespace App\Actions\Central\Blog;

use App\Models\Post;
use Lorisleiva\Actions\Concerns\AsAction;

class View
{
    use AsAction;

    public function handle($id)
    {
        $post = Post::where("slug", $id)->firstOrFail();
        $posts = Post::orderByDesc("created_at")->get();
        return [$post, $posts];
    }

    public function asController($id)
    {
        [$post, $posts] = $this->handle($id);
        return view("welcome", ["post"=>$post, 'posts' => $posts]);
    }
}
