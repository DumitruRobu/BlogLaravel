<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "tags";
    public $timestamps = false;
    protected $guarded = false;

    public function post(){
        return $this->belongsToMany(Post::class, "post_tags", "tag_id", "post_id");
    }
}
