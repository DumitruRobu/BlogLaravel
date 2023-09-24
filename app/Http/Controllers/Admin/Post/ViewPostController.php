<?php


namespace App\Http\Controllers\Admin\Post;


use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;

class ViewPostController
{
    public function __invoke($id)
    {
        $element = Post::findOrFail($id);

        return view('admin.posts.viewPost', compact("element"));
    }
}
