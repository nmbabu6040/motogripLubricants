<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view(
            'admin.users.index',
            compact('users')
        );
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make(
                $request->password
            )

        ]);

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User Created Successfully'
            );
    }

    public function edit(User $user)
    {
        return view(
            'admin.users.edit',
            compact('user')
        );
    }

    public function update(
        Request $request,
        User $user
    ) {

        $data = [

            'name' => $request->name,

            'email' => $request->email

        ];

        if ($request->password) {

            $data['password'] = Hash::make(
                $request->password
            );
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User Updated Successfully'
            );
    }

    public function destroy(User $user)
    {
        if ($user->id == Auth::id()) {

            return back()->with(
                'error',
                'You cannot delete your own account.'
            );
        }

        if (User::count() <= 1) {

            return back()->with(
                'error',
                'Cannot delete the last user.'
            );
        }

        $user->delete();

        return back()->with(
            'success',
            'User Deleted Successfully'
        );
    }
}
