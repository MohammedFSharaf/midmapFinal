<?php

namespace App\Http\Controllers\User;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AppointmentController extends Controller
{
    public function index()
    {
        $center = Auth::user()->center;

        if ($center) {
            $appointments = $center->appointments()->latest()->get();
        } else {
            $appointments = collect(); // إرجاع مجموعة فارغة إذا لم يكن هناك مركز
        }
        return view('user.appointment.appointments',compact('appointments' ));
    }


    public function create()
    {

        $services = Auth::user()->center->services()->pluck('name', 'id')->toArray() ?? collect();
        $patients = Auth::user()->center->patients()->pluck('name', 'id')->toArray() ?? collect();
        $modalContent = view('user.appointment.create_appointment',compact('patients', 'services' ))->render();

        return response()->json(['modalContent' => $modalContent]);
    }


    public function store(Request $request)
    {
         // تخصيص رسائل الفلاديشن
         $messages = [
            'patient_id.required' => 'يجب اختيار مريض.',
            'patient_id.exists' => 'المريض المحدد غير موجود.',
            'service_id.required' => 'يجب اختيار خدمة.',
            'service_id.exists' => 'الخدمة المحددة غير موجودة.',
            'appointment_date.required' => 'يجب تحديد تاريخ الموعد.',
            'appointment_date.date' => 'يجب أن يكون تاريخ الموعد بتنسيق صحيح.',
            'appointment_date.after_or_equal' => 'تاريخ الموعد يجب أن يكون اليوم أو بعده.',
            'appointment_time.required' => 'يجب تحديد وقت الموعد.',
            'appointment_time.date_format' => 'وقت الموعد يجب أن يكون بتنسيق ساعة ودقيقة (HH:mm).',
            'notes.string' => 'الملاحظات يجب أن تكون نصاً.',
            'notes.max' => 'الملاحظات لا يمكن أن تتجاوز 1000 حرف.',
        ];

        // التحقق من المدخلات
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|date_format:H:i',
            'notes' => 'nullable|string|max:1000',
        ], $messages);

        $validated['center_id'] = Auth::user()->center->id;

        // إنشاء خدمة جديد
        Appointment::create($validated);

        $notification = trans('تم التعديل بنجاح');
        return response()->json(['redirect_url' => route('user.appointment.index'),
        'notification' => $notification ]    );
    }

    public function edit($id)
    {
        $appointment = Appointment::find($id);
        if($appointment->center_id == Auth::user()->center->id){
            $services = Auth::user()->center->services()->pluck('name', 'id')->toArray() ?? collect();
            $patients = Auth::user()->center->patients()->pluck('name', 'id')->toArray() ?? collect();
            $modalContent = view('user.appointment.edit_appointment',compact('appointment','services','patients'))->render();
            return response()->json(['modalContent' => $modalContent]);
        }

    }


    public function update(Request $request,$id)
    {
        $appointment = Appointment::find($id);
        if($appointment->center_id != Auth::user()->center->id){
            return ;
        }

        // تخصيص رسائل الفلاديشن
        $messages = [
            'patient_id.required' => 'يجب اختيار مريض.',
            'patient_id.exists' => 'المريض المحدد غير موجود.',
            'service_id.required' => 'يجب اختيار خدمة.',
            'service_id.exists' => 'الخدمة المحددة غير موجودة.',
            'appointment_date.required' => 'يجب تحديد تاريخ الموعد.',
            'appointment_date.date' => 'يجب أن يكون تاريخ الموعد بتنسيق صحيح.',
            'appointment_date.after_or_equal' => 'تاريخ الموعد يجب أن يكون اليوم أو بعده.',
            'appointment_time.required' => 'يجب تحديد وقت الموعد.',
            'appointment_time.date_format' => 'وقت الموعد يجب أن يكون بتنسيق ساعة ودقيقة (HH:mm).',
            'status.required' => 'يجب تحديد حالة الموعد.',
            'status.in' => 'الحالة يجب أن تكون إما "مجدول"، "مكتمل" أو "ملغى".',
            'notes.string' => 'الملاحظات يجب أن تكون نصاً.',
            'notes.max' => 'الملاحظات لا يمكن أن تتجاوز 1000 حرف.',
        ];

        // التحقق من المدخلات
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date ',
            'appointment_time' => 'required',
            'status' => 'required|string',
            'notes' => 'nullable|string|max:1000',
        ], $messages);

        // تحديث بيانات الخدمة
        $appointment->update($validated);

        $notification = trans('تم التعديل بنجاح');
        return response()->json(['redirect_url' => route('user.appointment.index'),
        'notification' => $notification ]    );
    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        if($appointment->center_id != Auth::user()->center->id){
            $notification = trans('dash.you dont have permission to access this resource');
            $notification = array('messege'=>$notification,'alert-type'=>'warning');
            return redirect()->back()->with($notification);
        }
        $appointment->delete();

        $notification = trans('dash.Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('user.appointment.index')->with($notification);
    }

    public function changeStatus($id){
        $appointment = Appointment::find($id);
        if($appointment->center_id == Auth::user()->center->id){
            if($appointment->is_active==1){
                $appointment->is_active=0;
                $appointment->save();
                $message = trans('dash.Inactive Successfully');
            }else{
                $appointment->is_active=1;
                $appointment->save();
                $message= trans('dash.Active Successfully');
            }
            return response()->json($message);
        }

    }


    public function calendar(){


    }
    public function calendar_appointments()
    {

        $center = Auth::user()->center;

        if ($center) {
            $appointments = $center->appointments()->latest()->get();
            $appointments = $center->appointments()->with('service', 'patient')->latest()
            ->get()
            ;

            return view('user.appointment.calendar_appointments',compact('appointments'));
        }
    }
}
