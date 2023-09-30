<?php


namespace App\Http\Controllers\Admin\User;


use App\Models\User;

class DeleteUserController
{
    public function __invoke($id)
    {
        $element = User::findOrFail($id);
        $element->delete();
        return redirect(route("admin.user.index"));
    }
}
