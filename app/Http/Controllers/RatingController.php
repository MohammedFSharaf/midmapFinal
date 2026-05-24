<?php
 
namespace App\Http\Controllers;
 
use App\Models\Rating;
use App\Models\Center;
use Illuminate\Http\Request;
 
class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'center_id' => 'required|exists:centers,id',
            'rating'    => 'required|integer|min:1|max:5',
        ]);
 
        $ip = $request->ip();
 
        // تحقق إذا نفس الـ IP قيّم قبل
        $existing = Rating::where('center_id', $request->center_id)
                          ->where('ip_address', $ip)
                          ->first();
 
        if ($existing) {
            // عدّل التقييم القديم
            $existing->update(['rating' => $request->rating]);
        } else {
            Rating::create([
                'center_id'  => $request->center_id,
                'ip_address' => $ip,
                'rating'     => $request->rating,
            ]);
        }
 
        return redirect()->back()->with('success', 'Rating submitted successfully!');
    }
}
