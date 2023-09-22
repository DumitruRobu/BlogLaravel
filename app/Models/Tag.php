<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = "tags";
    public $timestamps = false;
    protected $guarded = false;

    public function post(){
        $this->belongsToMany(Post::class, "posttag", "tag_id", "post_id");git lo
    }
}
