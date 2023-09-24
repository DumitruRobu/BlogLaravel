<?php
namespace App\Http\Controllers\Admin\Post;

class CreateController
{
    public function __invoke()
    {
        return view("admin.posts.create");
    }
}
