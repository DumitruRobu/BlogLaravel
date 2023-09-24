<?php


namespace App\Http\Controllers\Admin\Tag;


use App\Models\Tag;

class IndexController
{
    public function __invoke()
    {
        $tags = Tag::all();
        $contor = 1;
        return view("admin.tags.index", compact("tags", "contor"));
    }
}
