<?php


namespace App\Http\Controllers\Admin\Post;


use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;

class UpdatePostController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);

        $element = Post::findOrFail($post->id);
        return view('admin.posts.viewPost', compact('element'));
    }
}
