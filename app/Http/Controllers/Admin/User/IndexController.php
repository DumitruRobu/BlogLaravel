<?php


namespace App\Http\Controllers\Admin\User;


use App\Models\User;

class IndexController
{
    public function __invoke()
    {
        $users = User::all();
        $contor = 1;
        return view("admin.users.index", compact("users", "contor"));
    }
}
