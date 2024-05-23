<?php

namespace App\Http\Controllers;

use App\Models\User; 
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
    public function show(Task $task): View
    {
        $currentDate = today('Asia/Jakarta')->format('Y-m-d');
        $currentTime = now('Asia/Jakarta')->format('H:i:s');

        $task = $task->loadDatesForCurrentWeek();

        return view('task.show', compact('task', 'currentDate', 'currentTime'));
    }

    public function AllTask() {
        $task = Task::latest()->get();
        return view('backend.task.task',compact('task'));
    }

    public function AddTask() {
        return view('backend.task.task');
    }

    public function StoreMovie(Request $request) {
        $users = User::all(); // Fetch all users
        return view('admin.create-task', compact('task')); // Pass users to the view
        
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/task/'), $filename);
        $task = Task::create([
            'description' => $request->description,
            'assigneduser_id' => $request->assigneduser_id,
            'assignedteam_id' => $request->assignedteam_id,
            'user_info' => $request->user_info,
            'other_description' => $request->other_description,
            'due' => $request->due,
            'completed' => $request->completed,
            'created_at' => Carbon::now(),
        ]);
        $task->save();


        $notification = array(
            'message' => 'Task added successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.task')->with($notification);
    }

    public function EditTask($id) {

        $task = Task::findOrFail($id);
        return view('backend.task.task',compact('task'));
    }

    public function UpdateTask(Request $request, $id) {
    
        // Find the task by ID or fail with a 404 error
        $task = Task::findOrFail($id);
    
            // Update the task with new data
            $task->update([
                'description' => $request->description,
                'assigneduser_id' => $request->assigneduser_id,
                'assignedteam_id' => $request->assignedteam_id,
                'user_info' => $request->user_info,
                'other_description' => $request->other_description,
                'due' => $request->due,
                'completed' => $request->completed,
                
            ]);
    
            // Redirect with success if changes were made to the model
            if ($task->wasChanged()) {
                return redirect()->route('all.task')->with('success', 'task updated successfully!');
            } else {
                return redirect()->route('all.task')->with('info', 'No changes detected.');
            }
    }
    


}

