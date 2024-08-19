<?php

namespace App\Http\Controllers;

use App\Events\CancelledClass;
use App\Models\ClassType;
use App\Models\SceduleClasses;
use Illuminate\Http\Request;

class SceduleClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $scheduledClasses  = auth()->user()->SceduledClasses()->upcoming()->oldest('date_time')->get();
        return view('instructor.upcoming')->with('scheduledClasses',$scheduledClasses);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classTypes = ClassType::all();
        return view('instructor.schedule')->with('classTypes',$classTypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $date_time = $request->input('date') . ' ' . $request->input('time');
        $request->merge([
            'date_time' => $date_time,
            'instructor_id' => auth()->id()
        ]);
        $validated = $request->validate([
            'class_type_id' => 'required',
            'instructor_id' => 'required',
            'date_time' => 'required|unique:scedule_classes,date_time|after:now'
        ]);
        SceduleClasses::create($validated);
        return redirect()->route('schedule.index');
    }

   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SceduleClasses $schedule)
    {
        //
        // if(auth()->user()->id !== $schedule->instructor_id)
        // {
        //     abort(403);
        // }
        if(auth()->user()->cannot('delete' , $schedule))
        {
            abort(403);
        }
        else
        {
            CancelledClass::dispatch($schedule);
            
            // $schedule->delete();
            // $schedule->members()->detach();
            return redirect()->route('schedule.index');
        }
    }
}
