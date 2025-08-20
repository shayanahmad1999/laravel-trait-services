<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create()
    {
        return view('user');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = $this->userService->create($validated);

        Auth::login($user);

        return response()->json([
            'message' => 'User created successfully!',
            'user'    => $user,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        $this->userService->updateProfile($validated);

        return response()->json(['message' => 'Profile updated successfully.']);
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:2048',
        ]);

        $path = $this->userService->updateAvatar($request->file('avatar'));

        return response()->json(['message' => 'Avatar updated.', 'path' => $path]);
    }

    public function toggleTheme(Request $request)
    {
        $request->validate([
            'theme' => 'required|in:dark,light',
        ]);

        $this->userService->toggleTheme($request->theme);

        return response()->json(['message' => 'Theme preference updated.']);
    }
}
