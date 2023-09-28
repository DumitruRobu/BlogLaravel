<?php


namespace App\Http\Controllers\Admin\Post;


use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class UpdatePostController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post = $this->service->update($data,$post);


        //retrimitem pe pagina postului deja editat
        $element = Post::findOrFail($post->id);
        $idurileTagurilor = PostTag::where('post_id',$post['id'])->pluck("tag_id");
        $tagurile = Tag::whereIn("id", $idurileTagurilor)->pluck("title");
        return view('admin.posts.viewPost', compact('element', 'tagurile'));
    }
}
