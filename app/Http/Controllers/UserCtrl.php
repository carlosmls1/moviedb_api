<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserCtrl extends Controller
{
    //
    public function index()
    {
        $users = User::paginate();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('user.index')->with('success', 'User updated.');
    }

    public function store(UserCreateRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if ($user) {
            return redirect()->route('user.index')->with('success', 'User created.');
        }
    }

    public function delete(User $user)
    {
        if (auth()->user()->id != $user->id) {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'User deleted.');
        }
        return redirect()->route('user.index')->with('warning', 'Can\'t delete your own user.');

    }

}
