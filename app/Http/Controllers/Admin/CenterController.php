<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\User;
use App\Models\Center;
use App\Models\Country;
use App\Models\Category;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::latest()->get();
        return view('admin.center.centers',compact('centers'));
    }

    public function show(Center $center)
    {
        return view('admin.center.show', compact('center'));
    }

    public function create()
    {
        $currencies = Currency::orderBy('name','asc')->get();
        $countries = Country::orderBy('name','asc')->get();
        $cities = City::orderBy('name','asc')->get();
        $categories = Category::orderBy('name','asc')->get();
      return view('admin.center.create_center',compact('categories','cities','countries','currencies'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
           'center_name' => 'nullable|string',
            'center_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'exists:categories,id',
            'country_id' => 'exists:countries,id',
            'city_id' => 'exists:cities,id',
            'currency_id' => 'exists:currencies,id',
            'center_address' => 'nullable|string',
            'phone' => 'nullable|string',
            'maintenance_mode' => 'nullable',
            'youtube_url' => 'nullable|string',
            'instagram_url' => 'nullable|string',
            'facebook_url' => 'nullable|string',
            'twitter_url' => 'nullable|string',
            'overview' => 'nullable|string',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
        ] );
        if($request->hasFile('center_logo') && $request->file('center_logo')->isValid()){
            $center_logo = $request->file('center_logo')->store('/','files');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Center::create([
            'center_name' => $request->center_name,
            'center_logo' => $center_logo,
            'category_id' => $request->category_id,
            'country_id' =>  $request->country_id,
            'city_id' => $request->city_id,
            'user_id' => $user->id,
            'currency_id' => $request->currency_id,
            'center_address' => $request->center_address,
            'phone' => $request->phone,
            'maintenance_mode' => $request->maintenance_mode ?? '0',
            'youtube_url' => $request->youtube_url,
            'instagram_url' => $request->instagram_url,
            'facebook_url' => $request->facebook_url,
            'twitter_url' => $request->twitter_url,
            'overview' => $request->overview,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        $notification = trans('Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.center.index')->with($notification);

    }

    public function edit($id)
    {   $currencies = Currency::orderBy('name','asc')->get();
        $countries = Country::orderBy('name','asc')->get();
        $cities = City::orderBy('name','asc')->get();
        $categories = Category::orderBy('name','asc')->get();
        $center = Center::find($id);
       return view('admin.center.edit_center',compact('center','categories','cities','countries','currencies')) ;

    }


    public function update(Request $request,$id)
    {
        $center = center::find($id);

        $validated = $request->validate([
            'section1_title' => 'nullable|string',
            'section1_content' => 'nullable|string',
            'section1_title_en' => 'nullable|string',
            'center_name' => 'nullable|string',
            'center_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'exists:categories,id',
            'country_id' => 'exists:countries,id',
            'city_id' => 'exists:cities,id',
            'currency_id' => 'exists:currencies,id',
            'center_address' => 'nullable|string',
            'phone' => 'nullable|string',
            'maintenance_mode' => 'nullable',
            'youtube_url' => 'nullable|string',
            'instagram_url' => 'nullable|string',
            'facebook_url' => 'nullable|string',
            'twitter_url' => 'nullable|string',
            'overview' => 'nullable|string',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
        ]);
        $validated['center_logo']= $center->center_logo;
        if($request->hasFile('center_logo') && $request->file('center_logo')->isValid()){
            if($center->center_logo)
                Storage::disk('files')->delete($center->center_logo);
            $validated['center_logo'] = $request->file('center_logo')->store('/','files');
        }

        $center->update($validated);

        $notification = trans('updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.center.index')->with($notification);

    }

    public function destroy($id)
    {
        $center = Center::find($id);
        $center->delete();
        $notification = trans('Delete Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->route('admin.center.index')->with($notification);
    }

    public function changeStatus($id){
        $center = Center::find($id);
            if($center->status=='active'){
                $center->status='inactive';
                $center->save();
                $message = trans('Inactive Successfully');
            }else{
                $center->status='active';
                $center->save();
                $message= trans('Active Successfully');
            }
            return response()->json($message);
    }

}
