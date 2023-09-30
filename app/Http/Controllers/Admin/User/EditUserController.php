<?php


namespace App\Http\Controllers\Admin\User;


use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;

class EditUserController
{
    public function __invoke($id)
    {
        $element = User::findOrFail($id);
        return view('admin.users.editUser', compact("element"));
    }
}
