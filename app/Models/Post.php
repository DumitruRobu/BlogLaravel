<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    public $timestamps = "false";
    protected $guarded = "false";

    public function category(){
        $this->belongsTo(Category::class, "category_id", "id");
    }

    public function tag(){
        $this->belongsToMany(Tag::class, "posttag", "post_id", "tag_id");
    }
}











