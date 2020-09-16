<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UploadAvatarRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $courses = $user;
        return view('user.profile-user', compact('user', 'courses'));
    }

    public function update(ProfileRequest $request)
    {
        $userId = Auth::user()->id;
        User::findOrFail($userId)->update($request->all());
        return redirect()->route('user.show')->with('message', trans('message.update_success'));
    }

    public function updateAvatar(UploadAvatarRequest $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->hasFile('avatar')) {
            $avatar = $id . "_" . $request->avatar->getClientOriginalName();
            $oldAvatar = $user->avatar;
            Storage::delete(config('variable.storage') . $oldAvatar);
            $request->file('avatar')->storeAs(config('variable.storage'), $avatar);
        }
        $user->update(['avatar' => $avatar]);
        return redirect()->route('user.show')->with('message', trans('message.update_success'));
    }
}
