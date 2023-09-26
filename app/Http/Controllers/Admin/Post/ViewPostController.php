<?php


namespace App\Http\Controllers\Admin\Post;


use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class ViewPostController
{
    public function __invoke($id)
    {
        $element = Post::findOrFail($id);
        $idurileTagurilor = PostTag::where('post_id',$id)->pluck("tag_id");

        $tagurile = Tag::whereIn("id", $idurileTagurilor)->pluck("title");


        return view('admin.posts.viewPost', compact("element", "tagurile"));
    }
}
