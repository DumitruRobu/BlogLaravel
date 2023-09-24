<?php


namespace App\Http\Controllers\Admin\Tag;


use App\Models\Tag;

class DeleteTagController
{
    public function __invoke($id)
    {
        $element = Tag::findOrFail($id);
        $element->delete();
        return redirect(route("admin.tag.index"));
    }
}
