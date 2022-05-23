<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\EditRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        /**@var \Illuminate\Contracts\Auth\Authenticatable | \App\Models\User $user*/
        $user = Auth::user();

        return view('admin.profile', [
            'user' => $user
        ]);
    }

    public function update(EditRequest $request, User $user)
    {
        if ($request->validated()) {
            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'email' => $request->post('email'),
                    'password' => Hash::make($request->post('newPassword'))
                ]);
                $user->save();
            } else {
                $errors['password'][] = 'Неверно введен текущий пароль';
            }
            return redirect()->route('admin.users.index')
                ->with('success', __('messages.admin.users.update.success'));
        }

        return back()->with('error', __('messages.admin.users.update.fail'));
    }
}
