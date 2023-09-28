<?php


namespace App\Service;


use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data){
        try{
            $tags = $data['tag_ids'];
            unset($data['tag_ids']);

            $data['preview_image'] = Storage::disk('public')->put("/images", $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put("/images", $data['main_image']);

            $newPost = Post::firstOrCreate($data);

            //mai profesionist!
            $newPost->tags()->attach($tags);
            //mai putin profesionist!
        //  foreach($tags as $t){
        //      PostTag::create([
        //          'post_id'=>$newPost['id'],
        //          'tag_id'=>$t
        //      ]);
        //  }
        } catch(\Exception $exception){
            abort(404);
        }
    }

    public function update($data,$post){

        //return $post;
    }
}
