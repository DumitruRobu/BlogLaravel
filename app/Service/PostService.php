<?php


namespace App\Service;


use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data){
        try{
            Db::beginTransaction();
            if(isset($data['tag_ids'])){
                $tags = $data['tag_ids'];
                unset($data['tag_ids']);
            };

            $data['preview_image'] = Storage::disk('public')->put("/images", $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put("/images", $data['main_image']);

            $newPost = Post::firstOrCreate($data);

            //mai profesionist!
            if(isset($data['tag_ids'])){
                $newPost->tags()->attach($tags);
            }
            DB::commit();
            //mai putin profesionist!
        //  foreach($tags as $t){
        //      PostTag::create([
        //          'post_id'=>$newPost['id'],
        //          'tag_id'=>$t
        //      ]);
        //  }
        } catch(\Exception $exception){
            Db::rollBack();
            abort(500);
        }
    }

    public function update($data,$post){
        try{
            Db::beginTransaction();
            if(isset($data['tag_ids'])){
                $tags = $data['tag_ids'];
                unset($data['tag_ids']);
            };

            if( isset($data['preview_image'])){
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if( isset($data['main_image'])){
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post->update($data);
            if(isset($data['tag_ids'])){
                $post->tags()->sync($tags);
            }
            DB::commit();

        } catch(\Exception $exception){
            Db::rollBack();
            abort(500);
        }

        return $post;
    }
}
