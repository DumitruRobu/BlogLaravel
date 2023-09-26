<?php


namespace App\Http\Controllers\Admin\Post;


use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class EditPostController
{
    public function __invoke($id)
    {
        $element = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact("element","categories", "tags"));
    }
}
