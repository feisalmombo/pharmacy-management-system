<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordChangeController extends Controller
{
    // PasswordChangeController.php
public function edit()
{
    return view('auth.change-password');
}

public function update(Request $request)
{
    $request->validate([
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = auth()->user();
    $user->password = Hash::make($request->password);
    $user->password_changed = true;
    $user->save();

    return redirect()->route('dashboard')->with('status', 'Password changed successfully!');
}

}
