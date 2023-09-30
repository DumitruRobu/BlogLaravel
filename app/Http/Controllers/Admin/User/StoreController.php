<?php


namespace App\Http\Controllers\Admin\User;


use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;

class StoreController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        User::firstOrCreate($data);

        return redirect()->route("admin.user.index");
    }
}
