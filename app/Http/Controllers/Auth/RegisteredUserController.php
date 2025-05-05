<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Center;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    // التحقق من المدخلات
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'clinic_name' => ['required', 'string', 'max:255'],
        'category_id' => ['required', 'integer'],
        'country_id' => ['required', 'integer'],
        'city_id' => ['required', 'integer'],
        'address' => ['required', 'string', 'max:255'],
        'phone' => ['required', 'string', 'max:20'],
    ]);

    // إنشاء المستخدم
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    $center = Center::create([
        'category_id' => $request->category_id,
        'country_id' => $request->country_id,
        'city_id' => $request->city_id,
        'user_id' => $user->id,
        'center_name' => $request->clinic_name,
        'center_address' => $request->address,
        'phone' => $request->phone,
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect(route('user.dashboard', absolute: false));
}

}
