<?php


namespace App\Http\Controllers\Admin\Tag;


use App\Models\Tag;

class ViewTagController
{
    public function __invoke($id)
    {
        $element = Tag::findOrFail($id);

        return view('admin.tags.viewTag', compact("element"));
    }
}
