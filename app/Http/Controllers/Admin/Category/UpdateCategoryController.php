<?php


namespace App\Http\Controllers\Admin\Category;


use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class UpdateCategoryController
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);

        $element = Category::findOrFail($category->id);

        return view('admin.categories.viewCategory', compact('element'));
    }
}
