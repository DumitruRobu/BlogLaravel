<?php
namespace App\Http\Controllers\Admin\Post;

use App\Models\Category;

class CreateController
{
    public function __invoke()
    {
        $categories = Category::all();
        return view("admin.posts.create", compact("categories"));
    }
}
