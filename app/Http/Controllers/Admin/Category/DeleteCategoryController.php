<?php


namespace App\Http\Controllers\Admin\Category;


use App\Models\Category;

class DeleteCategoryController
{
    public function __invoke($id)
    {
        $element = Category::findOrFail($id);
        $element->delete();
        return redirect(route("admin.category.index"));
    }
}
