<?php

namespace App\Http\Controllers\User;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Center;

class ServiceController extends Controller
{
    public function index()
    {
        $center = Auth::user()->center;

        if ($center) {
            $services = $center->services()->latest()->get();
        } else {
            $services = collect(); // إرجاع مجموعة فارغة إذا لم يكن هناك مركز
        }
        return view('user.service.services',compact('services' ));
    }


    public function create()
    {
        $modalContent = view('user.service.create_service')->render();

        return response()->json(['modalContent' => $modalContent]);
    }


    public function store(Request $request)
    {
         // تخصيص رسائل الفلاديشن
         $messages = [
            'name.required' => 'اسم الخدمة مطلوب.',
            'name.string' => 'اسم الخدمة يجب أن يكون نصًا.',
            'name.max' => 'اسم الخدمة لا يمكن أن يتجاوز 255 حرفًا.',
            'description.string' => 'وصف الخدمة يجب أن يكون نصًا.',
            'description.max' => 'وصف الخدمة لا يمكن أن يتجاوز 1000 حرف.',
            'price.required' => 'سعر الخدمة مطلوب.',
            'price.numeric' => 'سعر الخدمة يجب أن يكون رقمًا.',
            'price.min' => 'سعر الخدمة يجب ألا يكون أقل من 0.',
            'duration.required' => 'مدة الخدمة مطلوبة.',
            'duration.integer' => 'مدة الخدمة يجب أن تكون عددًا صحيحًا.',
            'duration.min' => 'مدة الخدمة يجب أن تكون دقيقة واحدة على الأقل.',
            'duration.max' => 'مدة الخدمة لا يمكن أن تتجاوز 480 دقيقة (8 ساعات).',
        ];

        // التحقق من المدخلات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1|max:480', // المدة بين دقيقة و8 ساعات
        ], $messages);

        
        $validated['center_id'] = Auth::user()->center->id;

        // إنشاء خدمة جديد
        Service::create($validated);

        $notification = trans('Successfully');
        return response()->json(['redirect_url' => route('user.service.index'),
        'notification' => $notification ]    );
    }

    public function edit($id)
    {
        $service = Service::find($id);
        if($service->center_id == Auth::user()->center->id){
            $modalContent = view('user.service.edit_service',compact('service'))->render();
            return response()->json(['modalContent' => $modalContent]);
        }

    }


    public function update(Request $request,$id)
    {
        $service = service::find($id);
        if($service->center_id != Auth::user()->center->id){
            return ;
        }

        // تخصيص رسائل الفلاديشن
        $messages = [
          'name.required' => 'اسم الخدمة مطلوب.',
            'name.string' => 'اسم الخدمة يجب أن يكون نصًا.',
            'name.max' => 'اسم الخدمة لا يمكن أن يتجاوز 255 حرفًا.',
            'description.string' => 'وصف الخدمة يجب أن يكون نصًا.',
            'description.max' => 'وصف الخدمة لا يمكن أن يتجاوز 1000 حرف.',
            'price.required' => 'سعر الخدمة مطلوب.',
            'price.numeric' => 'سعر الخدمة يجب أن يكون رقمًا.',
            'price.min' => 'سعر الخدمة يجب ألا يكون أقل من 0.',
            'duration.required' => 'مدة الخدمة مطلوبة.',
            'duration.integer' => 'مدة الخدمة يجب أن تكون عددًا صحيحًا.',
            'duration.min' => 'مدة الخدمة يجب أن تكون دقيقة واحدة على الأقل.',
            'duration.max' => 'مدة الخدمة لا يمكن أن تتجاوز 480 دقيقة (8 ساعات).',
        ];

        // التحقق من المدخلات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1|max:480', // المدة بين دقيقة و8 ساعات
        ], $messages);

        // تحديث بيانات الخدمة
        $service->update($validated);

        $notification = trans('Successfully');
        return response()->json(['redirect_url' => route('user.service.index'),
        'notification' => $notification ]    );
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        if($service->center_id != Auth::user()->center->id){
            $notification = trans('dash.you dont have permission to access this resource');
            $notification = array('messege'=>$notification,'alert-type'=>'warning');
            return redirect()->back()->with($notification);
        }

        if(isset($service->icon))
        Storage::disk('files')->delete($service->icon);

        $service->delete();

        $notification = trans(' Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('user.service.index')->with($notification);
    }

    public function changeStatus($id){
        $service = service::find($id);
        if($service->center_id == Auth::user()->center->id){
            if($service->is_active==1){
                $service->is_active=0;
                $service->save();
                $message = trans('dash.Inactive Successfully');
            }else{
                $service->is_active=1;
                $service->save();
                $message= trans('dash.Active Successfully');
            }
            return response()->json($message);
        }

    }
}
