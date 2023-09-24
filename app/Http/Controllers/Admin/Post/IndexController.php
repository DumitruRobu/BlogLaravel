<?php


namespace App\Http\Controllers\Admin\Post;


use App\Models\Post;

class IndexController
{
    public function __invoke()
    {
        $posts = Post::all();
        $contor = 1;
        return view("admin.posts.index", compact("posts", "contor"));
    }
}
