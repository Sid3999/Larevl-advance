<?php

namespace App\Http\Controllers;
use App\Models\SceduleClasses;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create() {
        $scheduledClasses =  SceduleClasses::upcoming()->notBooked()->with('classType')->with('instructor')->oldest('date_time')->get();
        return view('member.book')->with('scheduledClasses', $scheduledClasses);
    }
    public function store (Request $request)
    {
    auth()->user()->bookings()->attach($request->scheduled_class_id);
    return redirect()->route('booking.index');
    }
    public function index()
    {
    $bookings = auth()->user()->bookings()->upcoming()->get();
    
    return view('member.upcoming')->with('bookings', $bookings);
    }
    public function destroy(int $id) {
        auth()->user()->bookings()->detach($id);
        return redirect()->route('booking.index');
    }
}
