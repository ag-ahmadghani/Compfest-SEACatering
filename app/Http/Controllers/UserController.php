<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;

        if (Auth::user()->role === 'admin') {
            $users = User::when(method_exists(User::class, 'subscriptions'), function($query) {
                    $query->withCount('subscriptions');
                })
                ->orderBy('created_at', 'desc')
                ->get();

            return view('dashboard.users.index', compact('users'));
        }else {
            $users = User::when(method_exists(User::class, 'subscriptions'), function($query) {
                    $query->withCount('subscriptions');
                })
                ->orderBy('created_at', 'desc')
                ->where('users.id', $id)
                ->get();

            return view('dashboard.users.index', compact('users'));
        }
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone_number' => 'nullable|string',
            'role' => 'required|in:admin,customer',
            // Add other validation rules as needed
        ]);

        $user->update($validated);

        return redirect()->route('dashboard.users.index')
            ->with('success', 'User updated successfully!');
    }

    public function toggleStatus(User $user)
    {
        $user->update([
            'status' => $user->status === 'active' ? 'inactive' : 'active'
        ]);

        return back()->with('success', 'User status updated successfully!');
    }
}