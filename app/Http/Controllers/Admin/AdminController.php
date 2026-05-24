<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Center;
use App\Models\Category;
use App\Models\Country;
use App\Models\City;
 
class AdminController extends Controller
{
    public function dashboard(){
        $totalClinics    = Center::count();
        $totalCategories = Category::count();
        $totalCountries  = Country::count();
        $totalCities     = City::count();
 
        return view('admin.dashboard', compact(
            'totalClinics',
            'totalCategories',
            'totalCountries',
            'totalCities'
        ));
    }
}