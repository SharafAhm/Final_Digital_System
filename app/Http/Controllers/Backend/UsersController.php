<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //public function AllUser()
    public function AllUser()
    {
        $user = User::latest()->get();
        return view('backend.user.all_user',compact('user'));
    }
    public function AddUser() {
        return view('backend.user.add_user');
    }

    public function StoreUser(Request $request) {
        $user = User::create([
            'username' => $request->firstname,
            'name'=> $request->lastname,
            'age' => $request->age,
            'role' => $request->role,
            'password' => Hash::make($request->pass),
            'created_at' => Carbon::now(),
        ]);

        return redirect()
            ->route('all.user')
            ->with('success', 'User added successfully!');
    }

    public function EditUser($id) {

        $user = User::findOrFail($id);
        return view('backend.user.edit_user',compact('user'));
    }

    public function UpdateUser(Request $request, $id) {
        // Validate input
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'role' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',  // Make password optional but minimum 8 chars if provided
        ]);

        // Find the user or fail
        $user = User::findOrFail($id);

        // Update user details
        $user->update([
            'username' => $request->firstname,
            'name' => $request->lastname,
            'age' => $request->age,
            'role' => $request->role,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        // Redirect with a success or error message
        if ($user->wasChanged()) {
            return redirect()->route('all.user')->with('success', 'User modified successfully!');
        } else {
            return redirect()->route('all.user')->with('error', 'No changes detected or an error occurred while updating the user.');
        }
    }

}
