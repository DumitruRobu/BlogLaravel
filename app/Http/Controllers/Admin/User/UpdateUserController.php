<?php


namespace App\Http\Controllers\Admin\User;


use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UpdateUserController
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        $element = User::findOrFail($user->id);

        return view('admin.users.viewUser', compact('element'));
    }
}
