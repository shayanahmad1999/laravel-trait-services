<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(array $data): User
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function updateProfile(array $data): void
    {
        $user = Auth::user();
        $user->update([
            'name'  => $data['name'],
            'email' => $data['email'],
        ]);
    }

    public function updateAvatar(UploadedFile $file): string
    {
        $user = Auth::user();

        // Delete old avatar if exists
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Store new avatar
        $path = $file->store('avatars', 'public');
        $user->update(['avatar' => $path]);

        return $path;
    }

    public function toggleTheme(string $theme): void
    {
        $user = Auth::user();
        $user->update(['theme' => $theme]);
    }
}
