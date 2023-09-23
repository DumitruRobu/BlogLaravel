<?php


namespace App\Http\Controllers\Admin\Category;


use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;

class EditCategoryController
{
    public function __invoke($id)
    {
        $element = Category::findOrFail($id);
        return view('admin.categories.editCategory', compact("element"));
    }
}
