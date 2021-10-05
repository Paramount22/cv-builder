<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailUpdateRequest;
use App\Http\Requests\PasswordUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('layouts.app', [
            'user' => $user
        ]);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        $this->authorize('is-user', $user);

        return view('user.edit', [
           'user' => $user
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateEmail(EmailUpdateRequest $request, User $user)
    {
        $this->authorize('is-user', $user);

        $user->email = $request->email;
        $user->save();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Your email has been updated',
                'email' => $user->email
            ]);
        }
        return redirect()->back()->with('success', 'E-mailová adresa je zmenená.');
    }

    /**
     * @param Request $request
     * @param User $user
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function updatePassword(PasswordUpdateRequest $request, User $user)
    {
        $this->authorize('is-user', $user);
        if( Hash::check($request->old_password, $user->password) ) {
            $user->update([
                'password' => bcrypt($request->new_password)
            ]);
            return redirect()->back()->with('success', 'Heslo je zmenené.');
        } else {
            return false;
        }
    }
}
