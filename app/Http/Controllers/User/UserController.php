<?php
 namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Center;
use App\Models\Order;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
 
class UserController extends Controller
{
    public function dashboard(){
        $center = Center::where('user_id', Auth::id())->first();
 
        $totalOrders      = Order::where('center_id', $center?->id)->count();
        $totalPatients    = Patient::where('center_id', $center?->id)->count();
        $totalAppointments = Appointment::where('center_id', $center?->id)->count();
        $totalServices    = Service::where('center_id', $center?->id)->count();
 
        return view('user.dashboard', compact(
            'center',
            'totalOrders',
            'totalPatients',
            'totalAppointments',
            'totalServices'
        ));
    }
}