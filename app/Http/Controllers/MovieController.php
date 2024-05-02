<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    /**
     * Index returns the home page.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $title = request()->input('search');
        $sort = request()->input('sort');

        $movies = Movie::filter($title, $sort)
            ->latest()
            ->paginate(8);

        return view('movies.home', compact('movies'));
    }

    /**
     * Show returns the movie detail page.
     *
     * @param Movie $movie
     * @return View
     */
    public function show(Movie $movie): View
    {
        $currentDate = today('Asia/Jakarta')->format('Y-m-d');
        $currentTime = now('Asia/Jakarta')->format('H:i:s');

        $movie = $movie->loadDatesForCurrentWeek();

        return view('movies.show', compact('movie', 'currentDate', 'currentTime'));
    }

    public function AllMovie() {
        $movie = Movie::latest()->get();
        return view('backend.movie.all_movie',compact('movie'));
    }

    public function AddMovie() {
        return view('backend.movie.add_movie');
    }

    public function StoreMovie(Request $request) {

        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/movie/'), $filename);
        $movie = Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'poster_url' => $filename,
            'age_rating' => $request->age_rating,
            'ticket_price' => $request->ticket_price,
            'duration_minutes' => $request->duration_minutes,
            'created_at' => Carbon::now(),
        ]);
        $movie->save();


        $notification = array(
            'message' => 'Movie added successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.movie')->with($notification);
    }

    public function EditMovie($id) {

        $movie = Movie::findOrFail($id);
        return view('backend.movie.edit_movie',compact('movie'));
    }

    public function UpdateMovie(Request $request, $id) {
    
        // Find the movie by ID or fail with a 404 error
        $movie = Movie::findOrFail($id);
    
            // Update the movie with new data
            $movie->update([
                'title' => $request->title,
                'description' => $request->description,
                'age_rating' => $request->age_rating,
                'ticket_price' => $request->ticket_price,
                'duration_minutes' => $request->duration_minutes,
                
            ]);
    
            // Redirect with success if changes were made to the model
            if ($movie->wasChanged()) {
                return redirect()->route('all.movie')->with('success', 'Movie updated successfully!');
            } else {
                return redirect()->route('all.movie')->with('info', 'No changes detected.');
            }
    }
    

public function DeleteMovie($id) {
    Movie::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Movie deleted successfully!',
        'alert-type' => 'success'
    );
    return redirect()
        ->route('all.movie')
        ->with($notification);
}
}
