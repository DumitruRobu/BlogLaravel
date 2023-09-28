<?php


namespace App\Http\Controllers\Admin\Post;


use App\Models\Post;

class DeletePostController extends BaseController
{
    public function __invoke($id)
    {
        $element = Post::findOrFail($id);
        $element->delete();
        return redirect(route("admin.post.index"));
    }
}
