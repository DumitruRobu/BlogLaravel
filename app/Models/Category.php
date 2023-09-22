<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    public $timestamps = "false";
    protected $guarded = "false";

   public function post(){
       $this->hasMany(Post::class, "category_id", "id");
   }



}
