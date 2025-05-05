<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index()
    {
        $site = Auth::user()->center??'';

        if ($site) {
            $orders = $site->orders()->latest()->get();
        } else {
            $orders = collect(); // إرجاع مجموعة فارغة إذا لم يكن هناك مركز
        }
        return view('user.orders.orders',compact('orders' ));
    }




    public function edit($id)
    {
        $order = Order::find($id);
        if($order->center_id == Auth::user()->center->id){
            $services = Auth::user()->center->services()->pluck('name', 'id')->toArray() ?? collect();
            $modalContent = view('user.orders.edit_order',compact('order','services'))->render();
            return response()->json(['modalContent' => $modalContent]);
        }

    }


    public function update(Request $request,$id)
    {
        $order = Order::find($id);
        if($order->center_id != Auth::user()->center->id){
            return ;
        }

        // تخصيص رسائل الفلاديشن
        $messages = [
            'name.required' => 'اسم المريض مطلوب.',
            'email.email' => 'يرجى إدخال بريد إلكتروني صالح.',
            'gender.in' => 'الجنس يجب أن يكون ذكر أو أنثى فقط.',
            'appointment_date.date' => 'تاريخ الميلاد يجب أن يكون بتنسيق صحيح.',
        ];

        // التحقق من المدخلات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'required|string',
            'appointment_date' => 'nullable|date',
            'appointment_time' => 'nullable',
            'notes' => 'nullable|string',
            'service_id' => 'nullable',
            'gender' => 'nullable|in:male,female',
            'status' => 'nullable|string',
        ], $messages);


        // تحديث بيانات الخدمة
        $order->update($validated);

        $notification = trans('تم التعديل بنجاح');
        return response()->json(['redirect_url' => route('user.order.index'),
        'notification' => $notification ]    );
    }

    public function destroy($id)
    {
        $appointment = Order::find($id);
        if($appointment->center_id != Auth::user()->center->id){
            $notification = trans('you dont have permission to access this resource');
            $notification = array('messege'=>$notification,'alert-type'=>'warning');
            return redirect()->back()->with($notification);
        }
        $appointment->delete();

        $notification = trans('Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('user.order.index')->with($notification);
    }

}
