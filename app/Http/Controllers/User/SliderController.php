<?php

namespace App\Http\Controllers\User;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    public function create()
    {
        $modalContent = view('user.sliders.create_slider')->render();

        return response()->json(['modalContent' => $modalContent]);
    }


    public function store(Request $request)
    {
        // التحقق من المدخلات
        $data = $request->validate([
            'slider_image' => 'nullable|image|mimes:jpg,png,jpeg',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',

        ] );

        $data['site_id'] = Auth::user()->center->site->id;

        if ($request->hasFile('slider_image') && $request->file('slider_image')->isValid()) {
            $data['slider_image'] = $request->file('slider_image')->store('/','files');
        }
        // إنشاء خدمة جديد
        Slider::create($data);

        $notification = trans('dash.Created Successfully');
        return response()->json(['message' => $notification]);
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        if($slider->site_id == Auth::user()->center->site->id){
            $modalContent = view('user.sliders.edit_slider',compact('slider'))->render();
            return response()->json(['modalContent' => $modalContent]);
        }

    }


    public function update(Request $request,$id)
    {
        $slider = Slider::find($id);
        if($slider->site_id != Auth::user()->center->site->id){
            return ;
        }

        $data = $request->validate([
            'slider_image' => 'nullable|image|mimes:jpg,png,jpeg',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',

        ] );

        if ($request->hasFile('slider_image') && $request->file('slider_image')->isValid()) {
            if($slider->slider_image)
            Storage::disk('files')->delete($slider->slider_image);
            $data['slider_image'] = $request->file('slider_image')->store('/','files');
        }

        // تحديث بيانات
        $slider->update($data);

        $notification = trans('dash.Update Successfully');
        return response()->json(['message' => $notification]);
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

        $notification = trans('dash.Delete Successfully');
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
