<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Time;
use App\Models\Appointment;

class WorkshopController extends Controller
{
    public function create(){
        $times = Time::all();
        return view('admin.create-workshop', compact('times'));
    }


    public function createWorkshop(){
        request()->validate([
            'name' => 'required|unique:workshops',
            'day' => 'required',
            'time' => 'required',
        ],
        [
            'name.required' => 'Workshop name field cannot be blank',
            'name.unique' => 'Please use another name, the workshop name already exists',
            'day.required' => 'Opening days field cannot be blank',
            'time.required' => 'Please tick the opening hours boxes',
        ]
    );

    $workshop = new Workshop();
    $workshop->name = request()->name;
    $workshop->day = request()->day;
    $workshop->time = serialize(request()->time);
    $workshop->save();
    return back()->with('success', 'Workshop created successfully');
    }

    public function showWorkshop(){
        $workshops = Workshop::orderBy('created_at', 'ASC')->get();
        return view('admin.show-workshop', compact('workshops'));
    }

    public function viewWorkshop($id){
        $workshop = Workshop::find($id);
        $workshopHour = unserialize($workshop->time);
        $times = Time::pluck('name');
        $time = json_decode($times);
        $results =  array_diff($time, $workshopHour);
        return view('admin.view-workshop')->with(['workshop' => $workshop, 'results' => $results, 'workshopHour' => $workshopHour]);
    }

    public function updateWorkshop($id){
         request()->validate([
            'name' => 'required',
            'day' => 'required',
    
        ],
        [
            'name.required' => 'Workshop name field cannot be blank',
            'day.required' => 'Opening days field cannot be blank',
            
        ]
    );

        $checkWorkshop = Workshop::where('name', request()->name)->first();
        if (!$checkWorkshop  || (int)$checkWorkshop->id === (int)$id  ) {
            $workshop = Workshop::find($id);
            $workshop->name = request()->name;
            $workshop->day = request()->day;
            $workshop->time = serialize(request()->time);
            $workshop->save();
            return back()->with('success', 'Workshop Updated');
        }
        
        return back()->with('error', 'Workshop name already exist. Please use another name');
        
    }

    public function deleteWorkshop($id){
        $workshop = Workshop::find($id)->delete();
        return back()->with('success', 'Workshop deleted');
    }

    public function bookedAppointment(){
        $appointments = Appointment::orderBy('created_at', 'desc')->get();
        return view('admin.booked-appointment', compact('appointments'));
    }

    public function deleteBookedAppointment($id){
        Appointment::find($id)->delete();
        return back()->with('success', 'The booked appointment was deleted');
    }
}
