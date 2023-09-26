<?php


namespace App\Http\Controllers\Admin\Post;


use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Support\Facades\Storage;

class StoreController
{
    public function __invoke(StoreRequest $request)
    {
        try{
            $data = $request->validated();
            $tags = $data['tag_ids'];
            unset($data['tag_ids']);

            $data['preview_image'] = Storage::put("/images", $data['preview_image']);
            $data['main_image'] = Storage::put("/images", $data['main_image']);

            $newPost = Post::firstOrCreate($data);

            //mai profesionist!
            $newPost->tags()->attach($tags);
            //mai putin profesionist!
//        foreach($tags as $t){
//            PostTag::create([
//                'post_id'=>$newPost['id'],
//                'tag_id'=>$t
//            ]);
//        }
        } catch(\Exception $exception){
            abort(404);
        }
            return redirect()->route("admin.post.index");
    }
}
