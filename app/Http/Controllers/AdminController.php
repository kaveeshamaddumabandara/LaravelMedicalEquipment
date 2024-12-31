<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Medicine;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get();
        $medicines = Medicine::all();
        return view('admin.dashboard', compact('users','medicines'));
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }

    public function updateRole($id)
    {
        $user = User::findOrFail($id);
        $user->role = 'admin';
        $user->save();
        return redirect()->route('admin.dashboard')->with('success', 'User role updated to admin.');
    }
}

