<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.add');
    }

    public function store(UserRequest $request)
    {
        $avatar = null;
        if ($request->hasFile('avatar')) {
            $avatar = uniqid() . "_" . $request->avatar->getClientOriginalName();
            $request->file('avatar')->storeAs('public/users', $avatar);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $avatar,
            'role' => $request->role,
            'introduce' => $request->introduce,
        ]);

        return redirect()->route('admin.users.index')->with('message', __('message.create_success'));
    }
}
