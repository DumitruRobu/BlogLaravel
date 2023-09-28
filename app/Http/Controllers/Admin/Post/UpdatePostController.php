<?php


namespace App\Http\Controllers\Admin\Post;


use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class UpdatePostController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $tags = $data['tag_ids'];
        unset($data['tag_ids']);

//        dd($data);
        if( isset($data['preview_image'])){
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        if( isset($data['main_image'])){
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        }

        $post->update($data);

        $post->tags()->sync($tags);

        //retrimitem pe pagina postului deja editat
        $element = Post::findOrFail($post->id);

        $idurileTagurilor = PostTag::where('post_id',$post['id'])->pluck("tag_id");
        $tagurile = Tag::whereIn("id", $idurileTagurilor)->pluck("title");
        return view('admin.posts.viewPost', compact('element', 'tagurile'));
    }
}
