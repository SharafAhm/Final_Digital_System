<?php

namespace App\Http\Controllers\Backend;

use App\Enums\BookingStatus;
use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\DateShowtime;
use App\Models\Movie;
use App\Models\Date;
use App\Models\Seat;
use App\Models\Showtime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class BookingsController extends Controller
{
    public function AllBooking() {
        $booking = Booking::latest()->get();
        return view('backend.booking.all_booking',compact('booking'));
    }



public function DeleteBooking($id) {

    $booking = Booking::findOrFail($id);

    if ($booking->status !== BookingStatus::CANCELLED) {
        return redirect()->route('all.booking')
                         ->with('error', 'Only paid bookings can be cancelled and refunded.');
    }

    // Update the booking status to 'cancelled'
    $booking->status = BookingStatus::CANCELLED;
    //$booking->save(); // Save the status update

    // Detach seats from the booking
    foreach ($booking->seats as $seat) {
        $booking->seats()->detach($seat->id);
    }
    $booking->save();
    // Restore the booking amount to the club's balance if the user is the club's representative
    $club = Club::where('representative_id', $booking->user_id)->first();
    if ($club) {
        $club->balance += $booking->total_price;
        $club->save();
    } else {
        // Optionally log the situation where no matching club is found
        Log::warning("No matching club found for representative with user ID: {$booking->user_id}");
    }

    return redirect()
        ->route('all.booking')
        ->with('success', 'Booking cancelled and refunded successfully!');
}


}