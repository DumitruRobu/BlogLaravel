<?php


namespace App\Http\Controllers\Admin\Tag;


use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Tag;

class UpdateTagController
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);

        $element = Tag::findOrFail($tag->id);

        return view('admin.tags.viewTag', compact('element'));
    }
}
