<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Workshop;
use App\Models\Sessions;
use Auth;


class AppointmentController extends Controller
{
    public function appointmentConfirmation(){
        // if (!session()->has('success')) {
        //     return redirect()->route('workshops');
        // }
        return view('user.appointment-confirmation');
    }

    
    public function confirmAppointment($id){
        request()->validate([
            'reason' => 'required',
            'hours' => 'required'
        ]);
        
        $date = date('Y-m-d');
        $bookedAppointment = Appointment::whereDate('created_at', $date)->pluck('user_id');
        if ($bookedAppointment->contains(Auth::id())) {
            return back()->with('error', 'Sorry, You cannot book more than one appointment a day');
        }
        
        $workshop = Workshop::find($id);
        $hoursChecked = request()->hours;
        $cost = count($hoursChecked) * 1000;
        
        $data = [
            'reason' => request()->reason,
            'user_id' => Auth::user()->id,
            'appointment_name' => $workshop->name,
            'appointment_day' => $workshop->day,
            'hours' => request()->hours,
            'cost' => $cost,
        ];

        request()->session()->put($data);
        return redirect()->route('continueAppointment')->with('success', 'continue');
    }
    public function continueAppointment(){
        // if (!session()->has('success')) {
        //     return redirect()->route('workshops');
        // }
        return view('user.continue-appointment');
    }

    public function createAppointment(){    
        $appointment = new Appointment();
        $appointment->reason = request()->session()->pull('reason');
        $appointment->user_id = request()->session()->pull('user_id');
        $appointment->appointment_name = request()->session()->pull('appointment_name');
        $appointment->appointment_day = request()->session()->pull('appointment_day');
        $appointment->hours = serialize(request()->session()->pull('hours'));
        $appointment->cost = request()->session()->pull('cost');
        $appointment->save();

        return redirect()->route('appointmentConfirmation')->with([
            'success' =>  'Your appointment has been booked',
            'bookedAppointmentName' => $appointment->appointment_name,
            'bookedHour' => unserialize($appointment->hours),
            'bookedDay' => $appointment->appointment_day,
            'cost' =>  $appointment->cost,

        ]);
    }

    public function appointment(){
        $appointments = Appointment::where('user_id', Auth::id())->get();
        return view('user.appointment', compact('appointments'));
    }

}
