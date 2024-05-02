<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function AllClub() {
        $club = Club::latest()->get();
        return view('backend.club.all_club',compact('club'));
    }

    public function AddClub() {
        return view('backend.club.add_club');
    }

    public function StoreClub(Request $request) {
        $club = Club::create([
            'name' => $request->name,
            'address' => $request->address,
            'street_number' => $request->street_number,
            'street_name' => $request->street_name,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'number' => $request->number,
            'email' => $request->email,
            'representative_id' => $request->repId,
            'balance' => $request->balance,
            'totalMembers' => $request->totalMembers,
            'discount' => $request->dicount,
            'created_at' => Carbon::now(),
        ]);

        return redirect()
        ->route('all.club')
        ->with('success', 'Club added successfully!');
    }

    public function EditClub($id) {

        $club = Club::findOrFail($id);
        return view('backend.club.edit_club',compact('club'));
    }

    public function UpdateClub(Request $request, $id) {
        // Find the club using the provided ID and update it
        $club = Club::findOrFail($id);  // Using the $id passed to the method
    
        $club->update([
            'name' => $request->name,
            'address' => $request->address,
            'street_number' => $request->street_number,
            'street_name' => $request->street_name,
            'city' => $request->city,
            'post_code' => $request->post_code,
            'number' => $request->number,
            'email' => $request->email,
            'representative_id' => $request->repId,  // Assuming 'representative_id' is correctly passed
            'balance' => $request->balance,
            'totalMembers' => $request->totalMembers,
            'discount' => $request->discount,
        ]);
    
        // Redirect with a success or error message
        if ($club->wasChanged()) {
            return redirect()->route('all.club')->with('success', 'Club modified successfully!');
        } else {
            return redirect()->route('all.club')->with('error', 'No changes detected or error occurred while updating the club.');
        }
    }
    

    public function DeleteClub($id) {
        Club::findOrFail($id)->delete();
        return redirect()
            ->route('all.club')
            ->with('success', 'Club deleted successfully!');

    }
}
