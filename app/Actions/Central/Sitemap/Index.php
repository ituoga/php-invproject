<?php

namespace App\Actions\Central\Sitemap;

use App\Models\Post;
use Illuminate\Routing\Router;
use Lorisleiva\Actions\Concerns\AsAction;

class Index
{
    use AsAction;

    public function handle()
    {
        $posts = Post::orderBy("created_at", "desc")->get();
        return $posts;
    }

    public static function routes(Router $router)
    {
        $router->get("/", static::class);
    }
    public function asController()
    {
        $posts = $this->handle();
        return response()->view("sitemap", ["posts" => $posts])->withHeaders(["Content-Type"=>"application/xml" ]);
    }
}
