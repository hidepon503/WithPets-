<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
        $request->validate([
            'owner_name' => ['required','string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'postcode' => ['required','numeric', 'digits:7'],
            'prefecture' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'building' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'numeric', 'digits_between:10,11'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'owner_birthday' => ['date'],
            'image' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'owner_image' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'introduction' => ['string', 'max:200'],
            'url' => ['url', 'max:255'],
            'twitter' => ['url', 'max:255'],
            'facebook' => ['url', 'max:255'],
            'instagram' => ['url', 'max:255'],
            'youtube' => ['url', 'max:255'],
            'line' => ['url', 'max:255'],
            'tiktok' => ['url', 'max:255'],
            'pinterest' => ['url', 'max:255']
        ]);

        $user = User::create([
            'name' => $request->name,
            'owner_name' => $request->owner_name,
            'postcode' => $request->postcode,
            'prefecture' => $request->prefecture,
            'address' => $request->city . $request->street . $request->building ,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tel' => $request->tel,
            // 'owner_birthday' => $request->owner_birthday,
            // 'introduction' => $request->introduction,
            // 'url' => $request->url,
            // 'twitter' => $request->twitter,
            // 'facebook' => $request->facebook,
            // 'instagram' => $request->instagram,
            // 'youtube' => $request->youtube,
            // 'line' => $request->line,
            // 'tiktok' => $request->tiktok,
            // 'pinterest' => $request->pinterest,
            // 'image' => $request->file('image')->store('public/sampleUser'),
            // 'owner_image' => $request->file('owner_image')->store('public/sampleOwner')
            'image' => $request->hasFile('image') ? $request->file('image')->store('public/sampleUser') : null,
            'owner_image' => $request->hasFile('owner_image') ? $request->file('owner_image')->store('public/sampleOwner') : null,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
